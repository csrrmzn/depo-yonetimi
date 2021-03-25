<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
</html>
<?php
include "db/Database.class.php";
include "function/Function.php";
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

            $username=security($_POST["username"]);
            $password=security($_POST["pass"]);

                $myQuery=$db->getRow("SELECT UserName,UserPassword FROM users WHERE UserName=?",array($username));
                    @$databaseUser=$myQuery->UserName;
                    @$databasePass=$myQuery->UserPassword;


                if (empty($username) && empty($password)) { ?>
                    <div class="alert alert-danger" role="alert">
                        Lütfen Kullanıcı Adınızı ve Şifrenizi Boş Bırakmayınız Giriş Ekranına Yönlendiriliyorsunuz!
                    </div>
                    <? comeBack(4);
                }else {
                    if ($databaseUser != $username || $databasePass != $password ) { ?>
                    <div class="alert alert-danger" role="alert">
                        Kullanıcı Adınız veya Şifreniz Hatalı Giriş Ekranına Yönlendiriliyorsunuz!
                    </div>
                        <? comeBack(3);
                    }else {
                        session_regenerate_id(true); // Oturum sabitlemesine karşı koruma
                        $_SESSION["LogedIn"]=true;
                        $_SESSION["username"]=$username;
                        $_SESSION["LoginIp"]=$_SERVER["REMOTE_ADDR"];
                        $_SESSION["userAgent"]=$_SERVER["HTTP_USER_AGENT"]; ?>
                        <div class="alert alert-success" role="alert">
                            Giriş Yapıldı Yönlendiriliyorsunuz!
                        </div>
                        <? go("Home.php",3);

                    }
                }

  			echo '<div class="alert alert-success">
			  		<strong>Güvenlik Adımı Başarılı!</strong>
		 		  </div>';
                   go("Home.php",3);
		} else {
            if (empty($username) && empty($password)) {
                echo'<div class="alert alert-success">
			  		    <strong>Kullanıcı Adınız veya Şifrenizi Boş Bırakmayınız</strong>
		 		    </div>';
                    comeBack(1);
            }else {
                echo'<div class="alert alert-success">
			  		<strong>Güvenlik Adımı Başarılı!</strong>
		 		</div>';
                   comeBack(1);
            }
            
		}

    
}else { ?>
    <div class="alert alert-success" role="alert">
        <h3>Lütfen Giriş Yapınız</h3>
        Bu Sayfayı Görüntüleme Yetkiniz Bulunmamaktadır."."Giriş Ekranına Yönlendiriliyorsunuz
    </div>
    <? go("Login.php",3);
}