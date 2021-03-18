<?php 
    include "Function.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kayıt Oluştur</title>

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
                    <h2>Yeni Kayıt</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <form method="post" action="Operation.php">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label required">Adınız</label>
                        <input type="text" required="required" name="name"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label required">Soyadınız</label>
                        <input type="text" required="required" name="lastname" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label required">Şifreniz</label>
                        <input type="password" required="required" name="pass" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label required">Email Adresiniz</label>
                        <input type="email" required="required" name="email" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label required">Doğum Tarihiniz</label>
                        <input type="text" required="required" name="birtday" class="form-control" id="exampleInputPassword1">
                    </div>
                    
                    <button type="submit" name="newregistration" class="btn btn-success btn-sm btn-block mb-2 ">Kayıt Ol</button>
                </form>
                    <div>
                        <a href="Index.php" ><button type="submit" class="btn btn-primary btn-sm btn-block">Zaten Üyeyim</button></a>
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