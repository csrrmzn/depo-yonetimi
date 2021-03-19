<?php
session_start();
include "Function.php";
session_unset($_SESSION["LogedIn"]);
session_destroy();
go("Index.php");



?>