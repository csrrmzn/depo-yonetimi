<?php
include "../../db/Database.class.php";
include "../../function/Function.php";
$db=new \vivense\db\Database();


if ($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["newregistration"]) && isset($_POST["g-recaptcha-response"]) )
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
		if($res['success'] == true)
        {

            if (isset($_POST["name"]) && isset($_POST["lastname"]) && isset($_POST["password"])==isset($_POST["passwordclone"]) && isset($_POST["secretcode"]) && isset($_POST["phonenumber"]) && isset($_POST["email"]) && isset($_POST["birtday"]))  
            {
          

                if (empty($_POST["name"]) || empty($_POST["lastname"]) || empty($_POST["password"]) || empty($_POST["passwordclone"]) || empty($_POST["email"]) || empty($_POST["birtday"]) )

                {
                
                    go("../../NewRegistration.php?confirm=empty");
            
                }else {
            
                $username=security($_POST["name"]);
                $lastname=security($_POST["lastname"]);
                $password=security($_POST["password"]);
                $secretcode=security($_POST["secretcode"]);
                $phone=security($_POST["phonenumber"]);
                $email=security($_POST["email"]);
                $birtday=security($_POST["birtday"]);

                $password=base64_encode($password);
                $addUser=$db->Insert('INSERT INTO users SET
                            UserName=?,
                            UserLastname=?,
                            UserPassword=?,
                            UserSecretCode=?,
                            UserPhone=?,
                            UserEmail=?,
                            UserBirtday=?',
                            array(
                            $username,
                            $lastname,
                            $password,
                            $secretcode,
                            $phone,
                            $email,
                            $birtday));
       
                }
        
            }else {
               
                go("../../NewRegistration.php?confirm=reloaded");
            }

            if ($addUser==true) {
                   
                        go("../../Login.php?confirm=okey");
                    }else {
                   
                        go("../../NewRegistration.php?confirm=no");
                    }


            /*go("../NewRegistration.php?confirm=securityerror2");*/

		} else {
            go("../../NewRegistration.php?confirm=securityerror");
            
		}
}else { 
   
    go("../../NewRegistration.php?confirm=ımposiblentry");
}