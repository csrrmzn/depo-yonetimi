<?php
include "../db/Database.class.php";
include "../function/Function.php";
$db=new \vivense\db\Database();
if (isset($_SESSION["LogedIn"])!=true)
{
go("../Login.php");
}else {
    go("../Home.php");
}


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


//Şifre Güncelleme İşlemi
if ($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["addnewpassword"]) && isset($_POST["newpasswordclone"]) && $_POST["newpassword"]==$_POST["newpasswordclone"])
{
    $username=security($_POST["name"]);
    $password=security($_POST["newpassword"]);
    $passwordClone=security($_POST["newpasswordclone"]);

    if (empty($username) && empty($password) && empty($passwordClone) ) {
        echo "Lütfen Tüm Bilgileri Doldurunuz.";
        comeBack(3);
    }else {
        $addNewPassword=$db->Update('UPDATE users SET
                            UserPassword=? WHERE UserName=?',
                            array($password,$username));
        if ($addNewPassword==true) {
            echo $updatePassword="Şifreniz Güncellendi Giriş Ekranına Yönlendiriliyorsunuz"."<br>";
            go("../Index.php",1);
        }else {
            echo $unupdatePassword="Şifreniz Güncellenemedi! Lütfen Tekrar Deneyiniz ";
            comeBack(3);
        }
    }

}

//Hesap Silme İşlemi
if (isset($_GET['UserId']))
{
    $userıd=strip_tags($_GET["UserId"]);

        $deleteMyAccount=$db->Delete('DELETE FROM users WHERE
                            UserId=?',
                            array($userıd));
        if ($deleteMyAccount==true) {
            echo $delete="Hesabınız Silindi Giriş Ekranına Yönlendiriliyorsunuz"."<br>";
            go("../Login.php",3);
        }else {
            echo $undelete="Hesabınız Silinemedi Giriş Ekranına Yönlendiriliyorsunuz ";
            comeBack(1);
        }

}

//Ürün Silme
if ($_GET["ProductId"]) {
    $productId=$_GET["ProductId"];
    $deleteProduct=$db->Delete("DELETE FROM product WHERE ProductId=?",array($productId));
    if ($deleteProduct==true) {
        /*$_SESSION["deleteproductconfirm"]=true;
        $_SESSION["productmessage"]=$productId;*/
        go("../Product.php?confirm=1&productId=$productId");
    }else {
       /* $_SESSION["producterrormessage"]=$productId;*/
        go("../Product.php?confirm=0&productId=$productId");
    }
}

//Kategori Silme
if ($_GET["CategoryId"]) {
    $categoryId=$_GET["CategoryId"];
    $deleteCategory=$db->Delete("DELETE FROM category WHERE CategoryId=?",array($categoryId));
    if ($deleteCategory==true) {
        /*$_SESSION["deletecategoryconfirm"]=true;
        $_SESSION["categorymessage"]=$categoryId;*/
        go("../Category.php?confirm=1&categoryId=$categoryId");
    }else {
        /*$_SESSION["categoryerrormessage"]=$categoryId;*/
        go("../Category.php?confirm=0&categoryId=$categoryId");
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
     if ($addProduct>0) {
         go("../ProductAdd.php?confirm=1");
     }elseif ($addProduct<=0 ) {
         go("../ProductAdd.php?confirm=0");
     }
}

//Kategori Ekleme İşlemi
if (isset($_POST["addcategory"]))
 {
     $categoryUniqid=security($_POST["categoryUniqid"]);
     $categoryName=security($_POST["categoryName"]);
     $addCategory=$db->Insert("INSERT INTO category SET
                     CategoryUniqid=?,
                     CategoryName=?",array(
                     $categoryUniqid,
                     $categoryName));
     if ($addCategory>0) {
         go("../CategoryAdd.php?confirm=1");
     }elseif ($addCategory<=0 ) {
         go("../CategoryAdd.php?confirm=0");
     }
}