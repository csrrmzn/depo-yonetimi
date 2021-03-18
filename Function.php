<?php
session_set_cookie_params(null,'/','localhost',false,true);
session_start();

function go($url,$time=0)
{
    if ($time != 0) {
        header("Refresh:$time;url=$url"); //Verdiğimiz süreye göre yönlendirme yapacaktır.
    }else {
        header("Location:$url"); //Eğer time sıfıra eşit ise belirlediğimiz url'e yönlenecektir.
    }
}

function comeBack($time=0)
{
    $url=$_SERVER["HTTP_REFERER"]; //Geldiğim yerin urlini depoladım.
    if ($time != 0) {
        header("Refresh:$time;url=$url"); //Verdiğimiz süreye göre yönlendirme yapacaktır.
    }else {
        header("Location:$url"); //Eğer time sıfıra eşit ise belirlediğimiz url'e yönlenecektir.
    }
}

/*function login()
{
    if ($_SESSION['LogedIn']==true &&
    $_SESSION['LoginIp']==$_SERVER['REMOTE_ADDR'] &&
    $_SESSION['userAgent']==$_SERVER['HTTP_USER_AGENT'])
    {
        $myIP=$_SERVER["REMOTE_ADDR"];
                $myBrowser=$_SERVER["HTTP_USER_AGENT"];

                if (isset($_SESSION["LogedIn"]) &&   $_SESSION["LogedIn"] === true &&
                $myIp = $_SESSION["LoginIp"] && $_SESSION["userAgent"] == $myBrowser)
                {
                    echo "Hoşgeldiniz Sayın"." ".$_SESSION["username"]."<br>";
                    echo "İşlemlerinize Üst Menüyü Kullanarak Devam Edebilirsiniz";
                }else {
                    go("Logout.php");
                }
    }
}*/