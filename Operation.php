<?php
include "db/Database.class.php";
include "Function.php";
$db=new \vivense\db\Database();
if (isset($_SESSION["LogedIn"])!=true)
{
go("Login.php");
}else {
    go("Home.php");
}
//Yeni Kayıt İşlemi
if ($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["newregistration"]))
{
    $username=strip_tags($_POST["name"]);
    $lastname=strip_tags($_POST["lastname"]);
    $password=strip_tags($_POST["pass"]);
    $email=strip_tags($_POST["email"]);
    $birtday=strip_tags($_POST["birtday"]);

    if (empty($username) && empty($lastname) && empty($password) && empty($email) && empty($birtday) ) {
        echo "Lütfen Tüm Bilgileri Doldurunuz.";
        comeBack(3);
    }else {
        $addUser=$db->Insert('INSERT INTO users SET
                            UserName=?,
                            UserLastname=?,
                            UserPassword=?,
                            UserEmail=?,
                            UserBirtday=?',
                            array($username,$lastname,$password,$email,$birtday));
        if ($addUser==true) {
            echo $add="Kayıt Başarılı Giriş Ekranına Yönlendiriliyorsunuz"."<br>";
        }else {
            echo $unadd="Kayıt Gerçekleştirilemedi Giriş Ekranına Yönlendiriliyorsunuz ";
            comeBack(3);
        }
    }

}//Yeni Kayıt İşlemi Bitti

//Şifre Güncelleme İşlemi
if ($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["addnewpassword"]) && isset($_POST["newpasswordclone"]) && $_POST["newpassword"]==$_POST["newpasswordclone"])
{
    $username=strip_tags($_POST["name"]);
    $password=strip_tags($_POST["newpassword"]);
    $passwordClone=strip_tags($_POST["newpasswordclone"]);

    if (empty($username) && empty($password) && empty($passwordClone) ) {
        echo "Lütfen Tüm Bilgileri Doldurunuz.";
        comeBack(3);
    }else {
        $addNewPassword=$db->Update('UPDATE users SET
                            UserPassword=? WHERE UserName=?',
                            array($password,$username));
        if ($addNewPassword==true) {
            echo $updatePassword="Şifreniz Güncellendi Giriş Ekranına Yönlendiriliyorsunuz"."<br>";
            go("Index.php",1);
        }else {
            echo $unupdatePassword="Şifreniz Güncellenemedi! Lütfen Tekrar Deneyiniz ";
            comeBack(3);
        }
    }

}//Şifre Güncelleme İşlemi Bitti

//Hesap Silme İşlemi
if (isset($_GET['UserId']))
{
    $userıd=strip_tags($_GET["UserId"]);

        $deleteMyAccount=$db->Delete('DELETE FROM users WHERE
                            UserId=?',
                            array($userıd));
        if ($deleteMyAccount==true) {
            echo $delete="Hesabınız Silindi Giriş Ekranına Yönlendiriliyorsunuz"."<br>";
            go("Login.php",3);
        }else {
            echo $undelete="Hesabınız Silinemedi Giriş Ekranına Yönlendiriliyorsunuz ";
            comeBack(1);
        }

}//Hesap Silme İşlemi Bitti





//Ürün Güncelleme


// Ürün Ekleme


//Ürün Silme


// Kategori Ekleme


// Json Dosyası Yükleme
