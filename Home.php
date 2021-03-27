<?php
include "Header.php";
include "SideBar.php";
$db=new \vivense\db\Database();
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Anasayfa</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="Index.php">Anasayfa</a></li>
              <li class="breadcrumb-item active"></li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
            <?php 
              $recordsProdcut=$db->getColumn("SELECT COUNT(ProductId) FROM product");
              $recordsCategory=$db->getColumn("SELECT COUNT(CategoryId) FROM category");
              $recordsPPP=$db->getColumn("SELECT SUM(ProductPurchasePrice) FROM product");
              $recordsPSP=$db->getColumn("SELECT SUM(ProductSellPrice) FROM product");
              $sum=$recordsPSP-$recordsPPP;
              
            ?>
              <div class="inner">
                <h3><?=$recordsProdcut;?></h3>

                <h4>Ürün</h4>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="Operation/Product.php" class="small-box-footer">Detaylı Gör <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?=$recordsCategory;?></h3>

                <h4>Kategori</h4>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="Operation/Category.php" class="small-box-footer">Detaylı Gör <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?=$recordsPPP;?>₺</h3>

                <h4>Toplam Maliyet</h4>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="Operation/IncomeExpense.php" class="small-box-footer">Detaylı Gör <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?=$sum;?>₺</h3>

                <h4>Toplam Kâr/Zarar</h4>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="Operation/IncomeExpense.php" class="small-box-footer">Detaylı Gör <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
          <div class="row">
            <div class="col-md-12 text-center">
              <?php
                if (@$_GET["confirm"]=="login") { ?>
                    <div class="alert alert-success">
                      Hoşgeldiniz Sayın <?=$_SESSION["username"];?>
                    </div>
              <?php } ?>
            </div>
          </div>
      </div>
    </section>
  </div>
<?php
include "Footer.php";
    
