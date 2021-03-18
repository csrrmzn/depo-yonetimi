<?php
include "db/Database.class.php";
include "Function.php";
$db=new \vivense\db\Database();
//Giriş İşlemi
if ($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["login"]) ) {
    $username=$_POST["username"];
    $password=$_POST["pass"];

    $myQuery=$db->getRow("SELECT UserName,UserPassword FROM users WHERE UserName=?",array($username));
        $databaseUser=$myQuery->UserName;
        $databasePass=$myQuery->UserPassword;


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

//Yeni Kayıt İşlemi
if ($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["newregistration"]))
{
    $username=$_POST["name"];
    $lastname=$_POST["lastname"];
    $password=md5(md5(md5(sha1(sha1(sha1($_POST["pass"]))))));
    $email=$_POST["email"];
    $birtday=$_POST["birtday"];

    if (empty($username) && empty($lastname) && empty($password) && empty($email) && empty($birtday) ) {
        echo "Lütfen Tüm Bilgileri Doldurunuz.";
        comeBack(4);
    }else {
        $addUser=$db->Insert('INSERT INTO users SET
                            UserName=?,
                            UserLastname=?,
                            UserPassword=?,
                            UserEmail=?,
                            UserBirtday=?',array($username,$lastname,$password,$email,$birtday));
    }

}









//Ürün Düzenleme


// Ürün Ekleme


//Ürün Silme


// Kategori Ekleme


// Json Dosyası Yükleme

