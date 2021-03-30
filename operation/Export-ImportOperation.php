<?php
include "../db/Database.class.php";
include "../Classes/PHPExcel.php";
include "../function/Function.php";
require_once('../vendor/php-excel-reader/excel_reader2.php');
require_once('../vendor/SpreadsheetReader.php');
$db=new \vivense\db\Database();
$value1=basename($_SERVER["PHP_SELF"]);
$value2=basename(__FILE__);
accessBlock($value1,$value2,"../Home.php");

//Toplu Ürün İndirme
if (isset($_POST["export"]) && isset($_POST["category"]))
{ 

    $categoryId=security($_POST["category"]);
    $myQuery=$db->getRows("SELECT * From product INNER JOIN category ON
                                    product.CategoryId=category.CategoryId WHERE
                                    product.CategoryId=?",array($categoryId));

    

        /* TANIMLAMALAR */
        $columns=array();
        $data=array();
        /*
        $replaceDotCol
        Decimal kolonlardaki noktayı (.) virgüle (,) dönüştürüelecek kolon numarası belirtilmelidir.
        Örneğin; Kolon 4'ün verilerinde nokta değilde virgül görülmesini istiyorsanız
        ilgili kolonun array key numarasını belirtmelisiniz. İlk kolonun key numarası 0'dır.
        */
        $replaceDotCol=array(); 
        foreach ($myQuery as $items) {
            $productUniqid=$items->ProductUniqid;
            $productName=$items->ProductName;
            $productPurchase=$items->ProductPurchasePrice;
            $productSell=$items->ProductSellPrice;
            $productContent=$items->ProductContent;
            $categoryName=$items->CategoryName;
            $subCategoryId=$items->SubCategoryId;

        /* Sütun Başlıkları */
        $columns=
        [
            "ProductUniqid",
            "ProductName",
            "ProductPurchasePrice",
            "ProductSellPrice",
            "ProductContent",
            "CategoryId",
            "SubCategoryId"
        ];
        
        
            /* Satır Verileri */
            $data[]=
            array(
            "$productUniqid",
            "$productName",
            "$productPurchase",
            "$productSell",
            "$productContent",
            "$categoryName",
            "$subCategoryId"
            );
        }
        $name=uniqid(true);
        exportExcel("Ürünler".$name,$columns,$data,$replaceDotCol);
    if ($myQuery>0) {
        go("../Export.php?confirm=successful",1);
    }else {
        go("../Export.php?confirm=unsuccessful",1);
    }
    
    
}

//Toplu Veri Yükleme
if (isset($_POST["import"]))
{


    $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];

    if(in_array($_FILES["file"]["type"],$allowedFileType)){

        $targetPath = '../uploads/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

        $Reader = new SpreadsheetReader($targetPath);

        $sheetCount = count($Reader->sheets());
        for($i=0;$i<$sheetCount;$i++)
        {

            $Reader->ChangeSheet($i);

            foreach ($Reader as $Row)
            {

                $productUniqid = "";
                if(isset($Row[0])) {
                    $productUniqid = $Row[0];
                    $productUniqid=security($productUniqid);
                }

                $productName = "";
                if(isset($Row[1])) {
                    $productName = $Row[1];
                    $productName=security($productName);
                }

                $productPurchasePrice = "";
                if(isset($Row[2])) {
                    $productPurchasePrice = $Row[2];
                    $productPurchasePrice=security($productPurchasePrice);
                }

                $productSellPrice = "";
                if(isset($Row[3])) {
                    $productSellPrice = $Row[3];
                    $productSellPrice=security($productSellPrice);
                }

                $productContent = "";
                if(isset($Row[4])) {
                    $productContent = $Row[4];
                    $productContent=security($productContent);
                }

                $categoryId = "";
                if(isset($Row[5])) {
                    $categoryId = $Row[5];
                    $categoryId=security($categoryId);
                }

                $subCategoryId = "";
                if(isset($Row[6])) {
                    $subCategoryId = $Row[6];
                    $subCategoryId=security($subCategoryId);
                }


                if (!empty($productUniqid) || !empty($productName) || !empty($productPurchasePrice) || !empty($productSellPrice) || !empty($productContent) || !empty($categoryId) || !empty($subCategoryId) ) {
                    $query=$db->Insert("INSERT INTO product SET
                                        ProductUniqid=?,
                                        ProductName=?,
                                        ProductPurchasePrice=?,
                                        productSellPrice=?,
                                        ProductContent=?,
                                        CategoryId=?,
                                        SubCategoryId=?",array(
                                        $productUniqid,
                                        $productName,
                                        $productPurchasePrice,
                                        $productSellPrice,
                                        $productContent,
                                        $categoryId,
                                        $subCategoryId
                    ));

                    if ($query==true) {
                        go("../Upload.php?confirm=successful");
                    } else {
                        go("../Upload.php?confirm=unsuccessful");
                    }

                }
            }

        }
    }
    else
    { 
        go("../Upload.php?confirm=error");
    }
}

/* Verileri Excel Olarak İndirip Kaydetme
$Excel=new PHPExcel();
if (isset($_POST["export"]) && isset($_POST["category"]))
{ 

    $categoryId=security($_POST["category"]);
    $myQuery=$db->getRows("SELECT * From product INNER JOIN category ON
                                    product.CategoryId=category.CategoryId WHERE
                                    product.CategoryId=?",array($categoryId));

    $Excel->getActiveSheet()->setTitle('sayfa1');


    $Excel->getActiveSheet()->setCellValue('A1','ProductUniqid');
    $Excel->getActiveSheet()->setCellValue('B1','ProductName');
    $Excel->getActiveSheet()->setCellValue('C1','ProductPurchasePrice');
    $Excel->getActiveSheet()->setCellValue('D1','ProductSellPrice');
    $Excel->getActiveSheet()->setCellValue('E1','ProductContent');
    $Excel->getActiveSheet()->setCellValue('F1','CategoryId');
    $Excel->getActiveSheet()->setCellValue('G1','SubCategoryId');

    $satir=2;
    foreach ($myQuery as $items) {
        $Excel->getActiveSheet()->setCellValue('A'.$satir,$items->ProductUniqid);
        $Excel->getActiveSheet()->setCellValue('B'.$satir,$items->ProductName);
        $Excel->getActiveSheet()->setCellValue('C'.$satir,$items->ProductPurchasePrice);
        $Excel->getActiveSheet()->setCellValue('D'.$satir,$items->ProductSellPrice);
        $Excel->getActiveSheet()->setCellValue('E'.$satir,$items->ProductContent);
        $Excel->getActiveSheet()->setCellValue('F'.$satir,$items->CategoryName);
        $Excel->getActiveSheet()->setCellValue('G'.$satir,$items->SubCategoryId);
        $satir++;
    }

    $save=PHPExcel_IOFactory::createWriter($Excel,'Excel2007');
    $save->save("Ürünler.xlsx");
    
    
    go("Import.php?confirm=successful");
}else {
    go("Import.php?confirm=unsuccessful");
}
*/