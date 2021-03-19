<?php 
include "Header.php";
$db=new \vivense\db\Database();
if (isset($_SESSION["LogedIn"])==true)
{
    $username=$_SESSION["username"];
}else {
    go("Index.php");
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Adınız</th>
                    <th scope="col">Soyadınız</th>
                    <th scope="col">Şifreniz</th>
                    <th scope="col">Email Adresiniz</th>
                    <th scope="col">Doğum Tarihiniz</th>
                    <th scope="col">Kayıt Tarihiniz</th>
                    <th scope="col">İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $myQuery=$db->getRows("SELECT * FROM users WHERE UserName=?",array($username));
                            foreach ($myQuery as $items) { ?>
                    <tr>
                        <th scope="row"><? echo $items->UserId; ?></th>
                        <td><? echo $items->UserName; ?></td>
                        <td><? echo $items->UserLastname; ?></td>
                        <td><? echo $items->UserPassword; ?></td>
                        <td><? echo $items->UserEmail; ?></td>
                        <td><? echo $items->UserBirtday; ?></td>
                        <td><? echo $items->registration_time; ?></td>
                        <td>
                            <a href="Operation.php?UserId=<?=$items->UserId;?>">
                                <button type="submit" class="btn btn-danger btn-sm">Hesabımı Sil</button>
                            </a>
                            <a href="NewPassword.php">
                                <button type="submit" class="btn btn-primary btn-sm">Şifremi Değiştir</button>
                            </a>
                        </td>
                    </tr>
                    <? } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>