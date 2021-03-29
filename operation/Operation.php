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
                    go("Login.php?confirm=updatepassword");
                }else {
                    go("NewPassword.php?confirm=unupdatepassword");
                }
            
        }
    }
    

}

//Hesap Silme İşlemi
if (isset($_POST["deletemyaccount"]))
{
    if (!empty($_GET["userId"])) {

        $userıd=security($_GET["userId"]);
        $deleteMyAccount=$db->Delete('DELETE FROM users WHERE
                            UserId=?',
                            array($userıd));
        if ($deleteMyAccount==true) {
            go("../Login.php?confirm=deletemyaccount");
        }else {
            go("../Login.php?confirm=undeletemyaccount");
        }
    }    
}

//Ürün Silme
if ($_GET["ProductId"]) {
    $productId=$_GET["ProductId"];
    $deleteProduct=$db->Delete("DELETE FROM product WHERE ProductId=?",array($productId));
    if ($deleteProduct==true) {
        go("../Product.php?confirm=1&productId=$productId");
    }else {
        go("../Product.php?confirm=0&productId=$productId");
    }
}

//Hesap Düzenleme İşlemi
if (isset($_POST["editmyaccount"]) && isset($_POST["newusername"]) && isset($_POST["newuserlastname"]) && isset($_POST["newsecretcode"]) &&
    isset($_POST["newuserphone"]) && isset($_POST["newuseremail"]) && isset($_POST["newuserbirtday"]) )
{
    if (!empty($_POST["newusername"]) && !empty($_POST["newuserlastname"]) && !empty($_POST["newuserpassword"]) && !empty($_POST["newsecretcode"]) &&    
        !empty($_POST["newuserphone"]) && !empty($_POST["newuseremail"]) && !empty($_POST["newuserbirtday"]))
    {
        $editusername=security($_POST["newusername"]);
        $edituserlastname=security($_POST["newuserlastname"]);
        $edituserpassword=security($_POST["newuserpassword"]);
        $editusersecretcode=security($_POST["newusersecretcode"]);
        $edituserphone=security($_POST["newuserphone"]);
        $edituseremail=security($_POST["newuseremail"]);
        $edituserbirtday=security($_POST["newuserbirtday"]);

        $userıd=$_GET["userıd"];
        $edituserpassword=base64_encode($edituserpassword);
        $editMyAccount=$db->Update("UPDATE users SET
                                    UserName=?,
                                    UserLastname=?,
                                    UserPassword=?,
                                    UserSecretcode=?,
                                    UserPhone=?,
                                    UserEmail=?,
                                    UserBirtday=? WHERE UserId=?",
                                    array(
                                    $editusername,
                                    $edituserlastname,
                                    $edituserpassword,
                                    $editusersecretcode,
                                    $edituserphone,
                                    $edituseremail,
                                    $edituserbirtday, $userıd));
        if ($editMyAccount==true) {
            go("../MyAccount.php?confirm=successful");
        }else {
            go("../MyAccount.php?confirm=unsuccessful");
        }
    }else {
        go("../MyAccount.php?confirm=empty");
    }

}else {
    go("../MyAccount.php?confirm=error");
}

//Kategori Düzenleme
if (isset($_POST["edit"]))
{
    if (isset($_GET["CategoryId"]) && isset($_POST["categoryUniqid"]) && isset($_POST["categoryName"])) {
        
        $categoryId=$_GET["CategoryId"];
        $categoryUniqid=security($_POST["categoryUniqid"]);
        $categoryName=security($_POST["categoryName"]);
        $editCategory=$db->Update("UPDATE category SET
                            CategoryUniqid=?,
                            CategoryName=?
                            WHERE CategoryId=?",array(
                            $categoryUniqid,
                            $categoryName,
                            $categoryId
                            ));
        if ($editCategory>0) {
            go("Category.php");
        }
    }else {
        go("../CategoryEdit.php?confirm=categoryediterror");
    }
}

//Kategori Silme
if ($_GET["CategoryId"]) {
    $categoryId=$_GET["CategoryId"];
    $deleteCategory=$db->Delete("DELETE FROM category WHERE CategoryId=?",array($categoryId));
    if ($deleteCategory==true) {
        go("../Category.php?confirm=1&categoryId=$categoryId");
    }else {
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
