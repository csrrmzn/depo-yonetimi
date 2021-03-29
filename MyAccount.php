<?php 
include "Header.php";
include "SideBar.php";
$db=new \vivense\db\Database();
?>
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Hesabım</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="Index.php">Anasayfa</a></li>
              <li class="breadcrumb-item active">Hesabım</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <div class="card-tools col-md-12 text-center">
      <h6>
      <?php
          @$get=$_GET["confirm"];
          switch ($get)
        {
          case 'successful': ?>
            <div class="alert alert-success">
              Bilgileriniz Düzenlendi
            </div>
          <?php break;
          case 'unsuccessful': ?>
          <div class="alert alert-danger">
            Beklenmedik Bir Hata Oluştu! Bilgileriniz Düzenlenemedi
          </div>
          <?php break;
          case 'empty': ?>
            <div class="alert alert-danger">
              Lütfen Tüm Bilgilerinizi Eksiksiz Doldurunuz
            </div>
          <?php break;
          case 'error': ?>
            <div class="alert alert-danger">
              Bilgileriniz Düzenlenemedi! Lütfen Tekrar Deneyiniz
            </div>
          <?php break;
        } ?>
      </h6>
    </div>
   <section class="content">
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Kullanıcı İşlemleri</h3>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <?php
                    $username=$_SESSION["username"];
                  $myQuery=$db->getRows("SELECT * FROM users WHERE UserName=?",array($username));
                              foreach ($myQuery as $items) {
                                $pass=$items->UserPassword;
                                $decodepass=base64_decode($pass);
                  ?>
                  <tr>
                    <th>Adınız</th>
                    <th>Soyadınız</th>
                    <th>Şifreniz</th>
                    <th>Güvenlik Kodunuz</th>
                    <th>Telefon Numaranız</th>
                    <th>E-posta Adresiniz</th>
                    <th>Doğum Tarihiniz</th>
                    <th>İşlemler</th>

                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td><?=$items->UserName;?></td>
                    <td><?=$items->UserLastname;?></td>
                    <td><?=$decodepass;?></td>
                    <td><?=$items->UserSecretCode;?></td>
                    <td><?=$items->UserPhone?></td>
                    <td><?=$items->UserEmail;?></td>
                    <td><?=$items->UserBirtday;?></td>
                    <td >
                    <a href="MyAccount.php?see=1"><button class="btn btn-primary" >Düzenle</button></a>
                    <a href="operation/Operation.php?userId=<?=$items->UserId;?>" ><button class="btn btn-danger" name="deletemyaccount">Hesabımı Sil</button ></a>
                    </td>
                  </tr>
                  <?php } ?>
                  </tfoot>
                </table>
              </div>
            </div>
            </div>
            <div class="col-md-12">
            <?php 
              if (isset($_GET["see"])==1) { ?>
                <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Kullanıcı Düzenleme</h3>
              </div>
              <form method="POST" action="operation/Operation.php">
                <div class="card-body">
                  <div class="form-group">
                    <input type="text" class="form-control" name="newusername" value="<?=$items->UserName;?>">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" name="newuserlastname" value="<?=$items->UserLastname;?>">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control" name="newuserpassword" value="<?=$items->UserPassword;?>">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" name="newusersecretcode" value="<?=$items->UserSecretCode;?>">
                  </div>
                  <div class="form-group">
                    <input type="tel" maxlength="10" class="form-control" name="newuserphone" value="<?=$items->UserPhone;?>">
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control" name="newuseremail" value="<?=$items->UserEmail;?>">
                  </div>
                  <div class="form-group">
                    <input type="date" class="form-control" name="newuserbirtday" >
                  </div>
                </div>
                <div class="card-footer">
                  <a href="operation/Operation.php?userıd=<?=$items->UserId;?>"><button type="submit" class="btn btn-primar float-right" name="editmyaccount">Güncelle</button></a>
                </div>
              </form>
            </div>
                <?php } ?>
            </div>
        </div>
      </div>
    </section>
</div>
<?php
include "Footer.php";