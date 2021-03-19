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
    go("Index.php",3);
}//Giriş İşlemi Bitti