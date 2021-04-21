<?php
include "function/Function.php";
$value1=basename($_SERVER["PHP_SELF"]);
$value2=basename(__FILE__);
accessBlock($value1,$value2,"Login.php");
if ($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["logout"])) {
    session_unset($_SESSION["LogedIn"]);
    session_destroy();
    go("Login.php");
}