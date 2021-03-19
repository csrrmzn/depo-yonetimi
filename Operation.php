<?php
include "db/Database.class.php";
include "Function.php";
$db=new \vivense\db\Database();
//Giriş İşlemi
if ($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["login"]) && isset($_POST["g-recaptcha-response"]) )
{
    $url = "https://www.google.com/recaptcha/api/siteverify";
		$data = [
			'secret' => "6Lec1IUaAAAAAGg0g3ZrMvoI1X7lpWg0m8HW0Pck",
			'response' => $_POST['g-recaptcha-response']
		];

		$options = array(
		    'http' => array(
		      'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
		      'method'  => 'POST',
		      'content' => http_build_query($data)
		    )
		  );

		$context  = stream_context_create($options);
  		$response = file_get_contents($url, false, $context);

		$res = json_decode($response, true);
		if($res['success'] == true) {

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

  			echo '<div class="alert alert-success">
			  		<strong>Güvenlik Adımı Başarılı!</strong>
		 		  </div>';
                   go("Home.php",3);
		} else {
			echo '<div class="alert alert-warning">
					  <strong>Lütfen Güvenlik Adımını Doğrulayınız!</strong>
				  </div>';
                  comeBack(3);
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

//Hesap Silme İşlemi
if (isset($_GET["deletemyaccount"]))
{
    $userıd=strip_tags($_GET["UserId;"]);

    if (empty($userıd)) {
        echo "HATA!";
        comeBack(4);
    }else {
        $deleteMyAccount=$db->Delete('DELETE FROM users WHERE
                            UserId=?',
                            array($userıd));
        if ($deleteMyAccount==true) {
            echo $delete="Hesabınız Silindi Giriş Ekranına Yönlendiriliyorsunuz"."<br>";
        }else {
            echo $undelete="Hesabınız Silinemedi Giriş Ekranına Yönlendiriliyorsunuz ";
            comeBack(4);
        }
    }

}//Hesap Silme İşlemi Bitti





//Ürün Düzenleme


// Ürün Ekleme


//Ürün Silme


// Kategori Ekleme


// Json Dosyası Yükleme

