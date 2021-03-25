<?php
include "function/Function.php";
if (isset($_SESSION["LogedIn"])==true)
    {
        header("Location:Home.php");
    }else {
        header("Location:Login.php");
}