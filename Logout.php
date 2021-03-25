<?php
include "function/Function.php";
if ($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["logout"])) {
    session_unset($_SESSION["LogedIn"]);
    session_destroy();
    go("Login.php");
}
