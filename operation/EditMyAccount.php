<?php
include "../db/Database.class.php";
include "../function/Function.php";
$db=new \vivense\db\Database();
if (isset($_SESSION["LogedIn"])!=true)
{
go("../Login.php");
}else {
    go("../Home.php");
}


    if (isset($_GET["UserId"]))
    {
        
        $editusername=security($_POST["newusername"]);
        $edituserlastname=security($_POST["newuserlastname"]);
        $edituserpassword=security($_POST["newuserpassword"]);
        $editusersecretcode=security($_POST["newusersecretcode"]);
        $edituserphone=security($_POST["newuserphone"]);
        $edituseremail=security($_POST["newuseremail"]);
        $edituserbirtday=security($_POST["newuserbirtday"]);

        $userıd=security($_GET["UserId"]);
        $edituserpassword=base64_encode($edituserpassword);
        $editMyAccount=$db->Update("UPDATE users SET
                                    UserName=?
                                    UserLastname=?,
                                    UserPassword=?,
                                    UserSecretCode=?,
                                    UserPhone=?,
                                    UserEmail=?,
                                    UserBirtday=? WHERE UserId=?",
                                    array(
                                    $editusername,
                                    $edituserlastname,
                                    $edituserpassword,
                                    $editusersecretcode,
                                    $edituserphone,
                                    $edituseremail,
                                    $edituserbirtday,
                                    $userıd));
        if ($editMyAccount==true) {
            go("../MyAccount.php?confirm=successful");
        }else {
            go("../MyAccount.php?confirm=unsuccessful");
        }
    }else {
        go("../MyAccount.php?confirm=empty");
    }



/*
//Hesap Düzenleme İşlemi
if ($_POST["editmy"])
{
    if (isset($_GET["UserId"]))
    {
        echo "burası2";
        $editusername=security($_POST["newusername"]);
        $edituserlastname=security($_POST["newuserlastname"]);
        $edituserpassword=security($_POST["newuserpassword"]);
        $editusersecretcode=security($_POST["newusersecretcode"]);
        $edituserphone=security($_POST["newuserphone"]);
        $edituseremail=security($_POST["newuseremail"]);
        $edituserbirtday=security($_POST["newuserbirtday"]);

        $userıd=security($_GET["UserId"]);
        $edituserpassword=base64_encode($edituserpassword);
        $editMyAccount=$db->Update("UPDATE users SET
                                    UserName=?
                                    UserLastname=?,
                                    UserPassword=?,
                                    UserSecretCode=?,
                                    UserPhone=?,
                                    UserEmail=?,
                                    UserBirtday=? WHERE UserId=?",
                                    array(
                                    $editusername,
                                    $edituserlastname,
                                    $edituserpassword,
                                    $editusersecretcode,
                                    $edituserphone,
                                    $edituseremail,
                                    $edituserbirtday,
                                    $userıd));
        if ($editMyAccount==true) {
           //s go("../MyAccount.php?confirm=successful");
        }else {
           // go("../MyAccount.php?confirm=unsuccessful");
        }
    }else {
       // go("../MyAccount.php?confirm=empty");
    }

}else {
    //go("../MyAccount.php?confirm=error");
}
*/