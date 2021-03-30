<?php
include "function/Function.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Giriş Yap</title>

  <!-- Google reCAPTCHA -->  
  <script src="https://www.google.com/recaptcha/api.js?lh=tr" async defer></script>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
<?php
  @$get=$_GET["confirm"];
  switch ($get)
  {
    case 'okey': ?>
      <div class="alert alert-success">
        Kayıt Oluşturuldu. Lütfen Giriş Yapınız
      </div>
    <?php break;
    case 'empty': ?>
      <div class="alert alert-danger">
        Lütfen Kullanıcı Adınızı ve Şifrenizi Boş Bırakmayınız
      </div>
    <?php break;
    case 'error': ?>
      <div class="alert alert-danger">
        Kullanıcı Adınız veya Şifreniz Hatalı
      </div>
    <?php break;
    case 'securityerror': ?>
      <div class="alert alert-danger">
        Lütfen Güvenlik Adımını Doğrulayınız
      </div>
    <?php break;
    case 'success': ?>
      <div class="alert alert-success">
        Güvenlik Adımı Başarılı!
      </div>
    <?php break;
    case 'error': ?>
      <div class="alert alert-danger">
        Kullanıcı Adınız veya Şifreniz Hatalı
      </div>
    <?php break;
    case 'updatepassword': ?>
      <div class="alert alert-success">
        Şifreniz Güncellendi Lütfen Giriş Yapınız
      </div>
    <?php break;
    case 'unupdatepassword': ?>
      <div class="alert alert-danger">
        Şifreniz Güncellenemedi! Lütfen Tekrar Deneyiniz
      </div>
    <?php break;
    case 'deletemyaccount': ?>
      <div class="alert alert-success">
        Yakıştımı Bu Sana<br>
        Orkların Devrini Bitirdin
      <!--Mizaj Amaçlı Eklemiştir -->
      <div class="tenor-gif-embed" data-postid="19107837" data-share-method="host" data-width="100%" data-aspect-ratio="2.5670103092783507"></div><script type="text/javascript" async src="https://tenor.com/embed.js"></script>
      <!--Mizaj Amaçlı Eklemiştir -->
      </div>
    <?php break;
    case 'undeletemyaccount': ?>
      <div class="alert alert-danger">
        Hesabınız Silinemedi<br>
        Giriş Ekranına Yönlendirildiniz
      </div>
    <?php break;
    } ?>

  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="Login.php" class="h1"><b>Depo Yönetimi</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Lütfen Giriş Yapınız</p>

      <form method="post" action="operation/Do-Login.php" >
        <div class="input-group mb-3">
          <input type="text" name="username" placeholder="Adınız" class="form-control">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="pass" placeholder="Şifreniz" class="form-control" autocomplete="on">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="g-recaptcha" data-sitekey="6Lec1IUaAAAAAMUokhFj8TrPK6dob_VMxE5VxJiM"></div>
        <div class="row">
          <div class="col-12">
            <button type="submit" name="login" class="btn btn-success btn-sm btn-block">Giriş Yapınız</button>
          </div>
        </div>
      </form>
      <p class="mb-1">
        <a href="NewPassword.php">Şifremi Unuttum!</a>
      </p>
      <p class="mb-0">
        <a href="NewRegistration.php" class="text-center">Yeni Kayıt Oluştur</a>
      </p>
    </div>
  </div>
</div>
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
