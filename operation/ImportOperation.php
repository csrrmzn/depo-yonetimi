<?php
include "../db/Database.class.php";
include "../Classes/PHPExcel.php";
include "../function/Function.php";
$db=new \vivense\db\Database();

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
        $replaceDotCol=array(3); 
        

        /* Sütun Başlıkları */
        $columns=
        [
            'ProductUniqid',
            'ProductName',
            'ProductPurchasePrice',
            'ProductSellPrice',
            'ProductContent',
            'CategoryId',
            'SubCategoryId'
        ];
        
        foreach ($myQuery as $items) {
            /* Satır Verileri */
            $data[]=
            [
            "$items->ProductUniqid",
            "$items->ProductName",
            "$items->ProductPurchasePrice",
            "$items->ProductSellPrice",
            "$items->ProductContent",
            "$items->CategoryName",
            "$items->SubCategoruId"
            ];
        }
        $name=uniqid(true);
        exportExcel("Ürünler".$name,$columns,$data,$replaceDotCol);
    
    
    go("../Import.php?confirm=successful",1);
}else {
    go("../Import.php?confirm=unsuccessful",1);
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