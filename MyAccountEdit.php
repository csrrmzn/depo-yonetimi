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
                  <?php
                    $username=$_SESSION["username"];
                  $myQuery=$db->getRows("SELECT * FROM users WHERE UserName=?",array($username));
                              foreach ($myQuery as $items) {
                                $pass=$items->UserPassword;
                                $decodepass=base64_decode($pass);
                  ?>
            <div class="col-md-12">
                <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Kullanıcı Düzenleme</h3>
              </div>
              <form method="POST" action="operation/EditMyAccount.php">
                <div class="card-body">
                  <div class="form-group">
                    <label>Adınız</label>
                    <input type="text" class="form-control" name="newusername" value="<?=$items->UserName;?>">
                  </div>
                  <div class="form-group">
                    <label>Soyadınız</label>
                    <input type="text" class="form-control" name="newuserlastname" value="<?=$items->UserLastname;?>">
                  </div>
                  <div class="form-group">
                    <label>Şifreniz</label>
                    <input type="text" class="form-control" name="newuserpassword" value="<?=$decodepass;?>">
                  </div>
                  <div class="form-group">
                    <label>Güvenlik Kodunuz</label>
                    <input type="text" class="form-control" name="newusersecretcode" value="<?=$items->UserSecretCode;?>">
                  </div>
                  <div class="form-group">
                    <label>Telefon Numaranız</label>
                    <input type="tel" maxlength="10" class="form-control" name="newuserphone" value="<?=$items->UserPhone;?>">
                  </div>
                  <div class="form-group">
                    <label>E-Posta Adresiniz</label>
                    <input type="email" class="form-control" name="newuseremail" value="<?=$items->UserEmail;?>">
                  </div>
                  <div class="form-group">
                    <label>Doğum Tarihiniz</label>
                    <input type="tel" maxlength="8" class="form-control" name="newuserbirtday" value="<?=$items->UserBirtday;?>" >
                  </div>
                </div>
                <div class="card-footer">
                  <a href="operation/EditMyAccount.php?UserId=<?=$items->UserId;?>"><button type="submit" class="btn btn-primary float-right" >Güncelle</button></a>
                </div>
              </form>
            </div>
            </div>
            <?php } ?>
        </div>
      </div>
    </section>
</div>
<?php
include "Footer.php";