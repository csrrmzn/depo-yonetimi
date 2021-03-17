<?php
include "Lib/DbConnect.php";
include "Function.php";

//Giriş İşlemi

if ($_SERVER["REQUEST_METHOD"]=="POST") {
    $username=$_POST["username"];
    $password=md5($_POST["pass"]);

    $databaseUser=$userLogin["user_name"];
    $databasePass=$userLogin["user_password"];
    
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
    ?><h3>Lütfen Giriş Yapınız</h3><?
    echo "Bu Sayfayı Görüntüleme Yetkiniz Bulunmamaktadır."."Yönlendiriliyorsunuz..."."<br>";
    go("Home.php",3);
}











//Ürün Düzenleme


// Ürün Ekleme


//Ürün Silme


// Kategori Ekleme


// Json Dosyası Yükleme


?>