<?php
session_start();
include "Function.php";
session_unset();
session_destroy();
go("Index.php");



?>