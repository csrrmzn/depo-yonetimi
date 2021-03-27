<?php 
include "function/Function.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kayıt Ol</title>

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
  <!-- /.login-logo -->
    <?php
        if (@$_GET["confirm"]=="empty") { ?>
            <div class="alert alert-danger">
			        Lütfen Tüm Bilgileri Doldurunuz!
		 	      </div>
    <?php }elseif (@$_GET["confirm"]=="error") { ?>
            <div class="alert alert-danger">
			        Beklenmedik Bir Hata Oluştu Lütfen Tekrar Deneyiniz
		 	      </div>
    <?php }elseif (@$_GET["confirm"]=="no") { ?>
            <div class="alert alert-danger">
                Beklenmedik Bir Hata Oluştu Lütfen Tekrar Deneyiniz
            </div>
    <?php  }elseif (@$_GET["confirm"]=="reloaded") { ?>
            <div class="alert alert-danger">
              Kayıt Oluşturulamadı<br>Lütfen Sayfayı Yeniledikten Sonra Tekrar Deneyiniz
            </div>    
    <?php }elseif (@$_GET["confirm"]=="ımposiblentry") { ?>
            <div class="alert alert-danger">
              Tehditkar Yaklaşımda Bulunduz IP Adresiniz Engellendi
            </div>
    <?php }elseif (@$_GET["confirm"]=="securityerror") { ?>
            <div class="alert alert-danger">
              Lütfen Güvenlik Adımını Doğrulayınız
            </div>
    <?php }elseif (@$_GET["confirm"]=="securityerror2") { ?>
            <div class="alert alert-danger">
                Beklenmedik Bir Hata Oluştu Lütfen Tekrar Deneyiniz
            </div>
    <?php } ?>
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="NewPassword.php" class="h1">Yeni Kayıt Oluştur</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg"></p>
      <form method="post" action="operation/Do-NewRegistration.php">
        <div class="input-group mb-3">
          <input type="text" name="name" placeholder="Adınız" class="form-control">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" name="lastname" placeholder="Soyadınız" class="form-control">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" placeholder="Yeni Şifreniz" class="form-control" autocomplete="on">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="passwordclone" placeholder="Şifre Onayı" class="form-control" autocomplete="on">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" name="email" placeholder="E-posta Adresiniz" class="form-control">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="tel" name="phonenumber" pattern="[0-9]{4}-[0-9]{3}-[0-9]{2}-[0-9]{2}" placeholder="Telefon Numaranız" class="form-control">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="date" name="birtday" placeholder="Doğum Tarihinizi Giriniz" class="form-control">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-birthday-cake"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="g-recaptcha" data-sitekey="6Lec1IUaAAAAAMUokhFj8TrPK6dob_VMxE5VxJiM"></div>
            <button type="submit" name="newregistration" class="btn btn-success btn-sm btn-block">Kayıt Oluştur</button>
          </div>
        </div>
      </form>
      <p class="mb-0">
        <a href="NewPassword.php" class="float-left">Şifremi Unuttum</a>
        <a href="Login.php"  class="float-right">Ben Zaten Üyeyim</a>
      </p>
    </div>
  </div>
</div>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>