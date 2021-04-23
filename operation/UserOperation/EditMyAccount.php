<?php
include "../../db/Database.class.php";
include "../../function/Function.php";
$db=new \vivense\db\Database();

//Hesap Düzenleme İşlemi

//Hesap Silme İşlemi
if (isset($_GET['UserId']))
{
    $userıd=security($_GET["UserId"]);

        $deleteMyAccount=$db->Delete('DELETE FROM users WHERE
                            User_Id=?',
                            array($userıd));
        if ($deleteMyAccount==true) {
            go("../../Login.php?confirm=deletemyaccount");
        }else {
            go("../../Login.php?confirm=undeletemyaccount");
        }

}