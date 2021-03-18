<?php
include "db/Database.class.php";
include "Function.php";
$db=new \vivense\db\Database();
//Giriş İşlemi
if ($_SERVER["REQUEST_METHOD"]=="POST") {
    $username=$_POST["username"];
    $password=$_POST["pass"];

    $myQuery=$db->getRow("SELECT username,user_password FROM users WHERE username=?",array($username));
        $databaseUser=$myQuery->username;
        $databasePass=$myQuery->user_password;


    if (empty($username) && empty($password)) {
         echo "Lütfen Kullanıcı Adınızı ve Şifrenizi Boş Bırakmayınız.";
         comeBack(4);
    }else {
        if ($databaseUser != $username || $databasePass != $password ) {
            echo "Kullanıcı Adınız veya Şifreniz Hatalı";
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
    echo "Bu Sayfayı Görüntüleme Yetkiniz Bulunmamaktadır."."Yönlendiriliyorsunuz..."."<br>";
    go("Home.php",3);
}











//Ürün Düzenleme


// Ürün Ekleme


//Ürün Silme


// Kategori Ekleme


// Json Dosyası Yükleme

