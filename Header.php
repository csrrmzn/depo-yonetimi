<?php

include "db/Database.class.php";
include "Function.php";

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Anasayfa</title>

    <!--Bootstrap 4.6 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    
    <!-- CK Editör -->
    <script src="https://cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>

</head>

<body>

    <header>
        <nav style="background-color: black;" class="navbar navbar-expand-lg navbar-dark ">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="Index.php">Anasayfa <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Product.php">Ürünler</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Category.php">Kategoriler</a>
                    </li>
                </ul>

                <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="Export.php"><button class="btn btn-secondary btn-sm">Dışa Aktar</button></a>
                            <a href="Import.php"><button class="btn btn-secondary btn-sm">İçe Aktar</button></a>
                            <a href="Logout.php"><button class="btn btn-danger btn-sm">Güvenli Çıkış Yap</button></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main role="main">


        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">