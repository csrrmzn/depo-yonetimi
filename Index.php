<?php 
    include "Function.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş Yap</title>

    <!--Bootstrap 4.6 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    
    <!-- CK Editör -->
    <script src="https://cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <h2>Depo Yönetimi Uygulaması</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                    <form method="post" action="Operation.php" >
                        <div class="mb-3">
                            <label class="form-label">Kullanıcı Adınız</label>
                            <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Şifreniz</label>
                            <input type="password" name="pass" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="mb-2 d-grid gap-2">
                        <button type="submit" name="login" class="btn btn-success btn-sm btn-block">Giriş Yap</button>
                        </div>
                        </form>
                        <div class="mb-2">
                            <a href="NewRegistration.php"><button type="submit" name="newlogin" class="btn btn-primary btn-sm btn-block">Yeni Kayıt Oluştur</button>
</a>
                        </div>
                        <div class="-mb-1">
                            <a href="NewPassword.php">Şifremi Unuttum!</a>
                        </div>
                    
            </div>
            <div class="col-md-4">
            </div>
        </div>
    </div>
</body>
</html>
<?php 
    include "Footer.php";
?>