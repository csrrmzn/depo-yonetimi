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



    if ($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["edit"]))
    {
        
        $editusername=$_POST["new_username"];
        $edituserlastname=$_POST["new_userlastname"];
        $edituserpassword=$_POST["new_userpassword"];
        $editusersecretcode=$_POST["new_usersecretcode"];
        $edituserphone=$_POST["new_userphone"];
        $edituseremail=$_POST["new_useremail"];
        $edituserbirtday=$_POST["new_userbirtday"];

        $userıd=@$_GET["Id"];
        $edituserpassword=base64_encode($edituserpassword);
        $editMyAccount=$db->Update('UPDATE users SET UserName=?,
                                    UserLastname=?,
                                    UserPassword=?,
                                    UserSecretCode=?,
                                    UserPhone=?,
                                    UserEmail=?,
                                    UserBirtday=? WHERE UserId=?',
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
    }

//Hesap Silme İşlemi
if (isset($_GET['UserId']))
{
    $userıd=security($_GET["UserId"]);

        $deleteMyAccount=$db->Delete('DELETE FROM users WHERE
                            UserId=?',
                            array($userıd));
        if ($deleteMyAccount==true) {
            go("../Login.php?confirm=deletemyaccount");
        }else {
            go("../Login.php?confirm=undeletemyaccount");
        }

}//Hesap Silme İşlemi Bitti

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