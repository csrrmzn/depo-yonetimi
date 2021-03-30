<?php
include "../db/Database.class.php";
include "../function/Function.php";
$db=new \vivense\db\Database();
$value1=basename($_SERVER["PHP_SELF"]);
$value2=basename(__FILE__);
accessBlock($value1,$value2,"../Home.php");

/* 
//Yeni Kayıt İşlemi
if ($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["newregistration"]))
{
    if (isset($_POST["name"]) && isset($_POST["lastname"]) && isset($_POST["password"]) && isset($_POST["passwordclone"]) && isset($_POST["email"]) && isset($_POST["birtday"]))
    {

        if (empty($_POST["name"]) || empty($_POST["lastname"]) || empty($_POST["password"]) || empty($_POST["passwordclone"]) || empty($_POST["email"])
        || empty($_POST["birtday"]) ) {
            go("NewRegistration.php?confirm=empty");
        }else {
            
            $username=security($_POST["name"]);
            $lastname=security($_POST["lastname"]);
            $password=security($_POST["password"]);
            $email=security($_POST["email"]);
            $birtday=security($_POST["birtday"]);

        $addUser=$db->Insert('INSERT INTO users SET
                            UserName=?,
                            UserLastname=?,
                            UserPassword=?,
                            UserEmail=?,
                            UserBirtday=?',
                            array($username,$lastname,$password,$email,$birtday));
        if ($addUser==true) {
            go("Login.php?confirm=okey");
        }else {
            go("NewRegistration.php?confirm=no");
        }
    }
        
    }else {
        go("NewRegistration.php?confirm=reloaded");
    }

}else {
    go("NewRegistration.php?confirm=error");
}
*/

//Şifre Oluşturma İşlemi
if ($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["addnewpassword"]) && isset($_POST["newpasswordclone"]) && $_POST["newpassword"]==$_POST["newpasswordclone"])
{
    if (isset($_POST["name"]) && isset($_POST["secretcode"]) && isset($_POST["newpassword"])==isset($_POST["newpasswordclone"]))
    {
        $username=security($_POST["name"]);
        $secretcode=security($_POST["secretcode"]);
        $password=security($_POST["newpassword"]);
        $passwordClone=security($_POST["newpasswordclone"]);

        $myQuery=$db->getColumn("SELECT UserSecretCode FROM users WHERE UserName=?",array($username));
        $databaseSecretCode=$myQuery;

         if ($secretcode==$databaseSecretCode)
        {
            $secretPass=md5(md5(sha1(sha1($password))));

            $addNewPassword=$db->Update('UPDATE users SET
                                    UserPassword=? WHERE UserName=?',
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
        
            $categoryUniqid=$_POST["category_uniqid"];
            $categoryName=$_POST["category_name"];
            $addCategory=$db->Insert("INSERT INTO category SET
                            CategoryUniqid=?,
                            CategoryName=?",array(
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

    $deleteCategory=$db->Delete("DELETE FROM category WHERE CategoryId=?",array($categoryId));
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

    $deleteProduct=$db->Delete("DELETE FROM product WHERE ProductId=?",array($productId));
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
                     ProductUniqid=?,
                     ProductName=?,
                     ProductPurchasePrice=?,
                     ProductSellPrice=?,
                     ProductContent=?,
                     CategoryId=?",array(
                     $productUniqid,
                     $productName,
                     $productPurchasePrice,
                     $productSellPrice,
                     $productContent,
                     $categoryId));

     if ($addProduct==true) {
         go("../ProductAdd.php?Confirm=addproduct1");
     }elseif ($addProduct==false ) {
         go("../ProductAdd.php?Confirm=unaddproduct0");
     }
}