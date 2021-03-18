<?php
include "db/Database.class.php";
include "Function.php";
$db=new \vivense\db\Database();
//Giriş İşlemi
if ($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["login"]) )
{
    $username=strip_tags($_POST["username"]);
    $password=strip_tags($_POST["pass"]);

    $myQuery=$db->getRow("SELECT UserName,UserPassword FROM users WHERE UserName=?",array($username));
        @$databaseUser=$myQuery->UserName;
        @$databasePass=$myQuery->UserPassword;


    if (empty($username) && empty($password)) {
         echo "Lütfen Kullanıcı Adınızı ve Şifrenizi Boş Bırakmayınız Giriş Ekranına Yönlendiriliyorsunuz";
         comeBack(4);
    }else {
        if ($databaseUser != $username || $databasePass != $password ) {
            echo "Kullanıcı Adınız veya Şifreniz Hatalı Giriş Ekranına Yönlendiriliyorsunuz";
            comeBack(3);
        }else {
            session_regenerate_id(true); // Oturum sabitlemesine karşı koruma
            $_SESSION["LogedIn"]=true;
            $_SESSION["username"]=$username;
            $_SESSION["LoginIp"]=$_SERVER["REMOTE_ADDR"];
            $_SESSION["userAgent"]=$_SERVER["HTTP_USER_AGENT"];

            echo "Giriş Yapıldı Yönlendiriliyorsunuz";
            go("Home.php",3);

        }
    }

}else {
    ?><h3>Lütfen Giriş Yapınız</h3><?php
    echo "Bu Sayfayı Görüntüleme Yetkiniz Bulunmamaktadır."."Giriş Ekranına Yönlendiriliyorsunuz"."<br>";
    go("Home.php",3);
}//Giriş İşlemi Bitti



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
        comeBack(4);
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
            comeBack(4);
        }
    }

}//Yeni Kayıt İşlemi Bitti

//Şifre Güncelleme İşlemi
if ($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["addnewpassword"]))
{
    $username=strip_tags($_POST["name"]);
    $password=strip_tags($_POST["newpassword"]);

    if (empty($username) && empty($password) ) {
        echo "Lütfen Tüm Bilgileri Doldurunuz.";
        comeBack(4);
    }else {
        $addNewPassword=$db->Update('UPDATE users SET
                            UserPassword=? WHERE UserName=?',
                            array($password,$username));
        if ($addNewPassword==true) {
            echo $updatePassword="Şifreniz Güncellendi Giriş Ekranına Yönlendiriliyorsunuz"."<br>";
        }else {
            echo $unupdatePassword="Şifreniz Güncellenemedi Giriş Ekranına Yönlendiriliyorsunuz ";
            comeBack(4);
        }
    }

}//Şifre Güncelleme İşlemi Bitti






//Ürün Düzenleme


// Ürün Ekleme


//Ürün Silme


// Kategori Ekleme


// Json Dosyası Yükleme

