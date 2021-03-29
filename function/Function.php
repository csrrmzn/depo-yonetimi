<?php
session_set_cookie_params(null,'/','localhost',false,true);
date_default_timezone_set('Europe/Istanbul');
ob_start();
session_start();

function go($url,$time=0)
{
    if ($time != 0) {
        header("Refresh:$time;url=$url"); //Verdi�imiz s�reye g�re y�nlendirme yapacakt�r.
    }else {
        header("Location:$url"); //E�er time s�f�ra e�it ise belirledi�imiz url'e y�nlenecektir.
    }
}

function comeBack($time=0)
{
    $url=$_SERVER["HTTP_REFERER"]; //Geldi�im yerin urlini depolad�m.
    if ($time != 0) {
        header("Refresh:$time;url=$url"); //Verdi�imiz s�reye g�re y�nlendirme yapacakt�r.
    }else {
        header("Location:$url"); //E�er time s�f�ra e�it ise belirledi�imiz url'e y�nlenecektir.
    }
}

function accessBlock($value1,$value2,$value3)
{

    if ($value1 == $value2 ) {
        header("Location:$value3");
        exit();
    }
}

function unauthorized()
{
    if (empty($_SESSION["username"])) {

        header("Location:Login.php?unauthorized");
        exit;
    }
}

function security($text)
{
    $text=trim($text);
    $text=stripslashes($text);
    $text=htmlspecialchars($text);
    $text=strip_tags($text);
    return $text;
}

