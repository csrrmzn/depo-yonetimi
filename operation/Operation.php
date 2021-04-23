<?php
include "../db/Database.class.php";
include "../function/Function.php";
$db=new \vivense\db\Database();

//Şifre Oluşturma İşlemi
if ($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["addnewpassword"]) && isset($_POST["newpasswordclone"]) && $_POST["newpassword"]==$_POST["newpasswordclone"])
{
    if (isset($_POST["name"]) && isset($_POST["secretcode"]) && isset($_POST["newpassword"])==isset($_POST["newpasswordclone"]))
    {
        $username=security($_POST["name"]);
        $secretcode=security($_POST["secretcode"]);
        $password=security($_POST["newpassword"]);
        $passwordClone=security($_POST["newpasswordclone"]);

        $myQuery=$db->getColumn("SELECT User_SecretCode FROM users WHERE User_Name=?",array($username));
        $databaseSecretCode=$myQuery;

         if ($secretcode==$databaseSecretCode)
        {
            $secretPass=md5(md5(sha1(sha1($password))));

            $addNewPassword=$db->Update('UPDATE users SET
                                    User_Password=? WHERE User_Name=?',
                                    array($password,$username));
                if ($addNewPassword==true) {
                    go("../Login.php?confirm=updatepassword");
                }else {
                    go("../NewPassword.php?confirm=unupdatepassword");
                }
            
        }
    }
    

}

//Kategori Ekleme İşlemi
if ($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["addCategory"]))
{
    
    if (isset($_POST["category_uniqid"]) && isset($_POST["category_name"]))
    {
        
            $categoryUniqid=security($_POST["category_uniqid"]);
            $categoryName=security($_POST["category_name"]);
            $addCategory=$db->Insert("INSERT INTO category SET
                            Category_Uniqid=?,
                            Category_Name=?",array(
                            $categoryUniqid,
                            $categoryName));
                            
            if ($addCategory==true) {
                go("../CategoryAdd.php?confirm=addcategory1");
            }elseif ($addCategory==false ) {
                go("../CategoryAdd.php?confirm=unaddcategory0");
            }
    }
}

//Kategori Silme
if (isset($_GET["CategoryId"]))
{
    $categoryId=security($_GET["CategoryId"]);

    $deleteCategory=$db->Delete("DELETE FROM category WHERE Category_Id=?",array($categoryId));
    if ($deleteCategory==true) {
        go("../Category.php?confirm=okdelete");
    }else {
        go("../Category.php?confirm=nodelete");
    }
}

//Ürün Silme
if (isset($_GET["ProductId"]))
{
    $productId=security($_GET["ProductId"]);

    $deleteProduct=$db->Delete("DELETE FROM product WHERE Product_Id=?",array($productId));
    if ($deleteProduct==true) {
        go("../Product.php?confirm=1&productId=$productId");
    }else {
        go("../Product.php?confirm=0&productId=$productId");
    }
}

//Ürün Ekleme İşlemi
if (isset($_POST["addproduct"]))
 {
     $productUniqid=security($_POST["productUniqid"]);
     $productName=security($_POST["productName"]);
     $productPurchasePrice=security($_POST["productPurchasePrice"]);
     $productSellPrice=security($_POST["productSellPrice"]);
     $productContent=security($_POST["productContent"]);
     $categoryId=security($_POST["categoryId"]);

     $addProduct=$db->Insert("INSERT INTO product SET
                     Product_Uniqid=?,
                     Product_Name=?,
                     Product_PurchasePrice=?,
                     Product_SellPrice=?,
                     Product_Content=?,
                     Category_Id=?",array(
                     $productUniqid,
                     $productName,
                     $productPurchasePrice,
                     $productSellPrice,
                     $productContent,
                     $categoryId));

     if ($addProduct==true) {
         go("../ProductAdd.php?confirm=addproduct1");
     }elseif ($addProduct==false ) {
         go("../ProductAdd.php?confirm=unaddproduct0");
     }
}

//Not Ekleme İşlemi
if ($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["addnote"]) && isset($_POST["notesubject"]) && isset($_POST["notedescription"]))
{
    $username=$_SESSION["username"];
    $userId=$db->getColumn("SELECT User_Id FROM users WHERE User_Name=?",array($username));

    $noteSubject=security($_POST["notesubject"]);
    $noteDescription=security($_POST["notedescription"]);
    
    $addNote=$db->Insert("INSERT INTO notes SET
                        Note_Subject=?,
                        Note_Description=?,
                        User_Id=?",array(
                        $noteSubject,
                        $noteDescription,
                        $userId));
    
    if ($addNote==true)
    {
        go("../Home.php?confirm=addnote");
    }else {
        go("../Home.php?confirm=notaddnote");
    }
}

//Not Silme İşlemi
if (isset($_GET["noteıd"]))
{
    $noteUniqid=security($_GET["noteıd"]);
    $deleteNote=$db->Delete("DELETE FROM notes WHERE Note_Uniqid=?",array($noteUniqid));

    if ($deleteNote==true)
    {
        go("../Home.php?confirm=deletenote");
    }else {
        go("../Home.php?confirm=notdeletenote");
    }
}