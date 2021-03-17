<?php 
include "Header.php";
if (isset($_SESSION["LogedIn"])==true)
{
    
}else {
    go("Index.php");
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <?php
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
            ?>
        </div>
    </div>
</div>

<?php
include "Footer.php";
?>

    
