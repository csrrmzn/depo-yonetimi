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
                <h3><?php echo $recordsProdcut;?></h3>

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
                <h3><?php echo $recordsCategory;?></h3>

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
                <h3><?php echo $recordsPPP;?>₺</h3>

                <h4>Toplam Alış Fiyatı</h4>
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
                <h3><?php echo $sum;?>₺</h3>

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
              <?php
                if (isset($_GET) && isset($_GET["see"])=="success")
                { ?>
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Yeni Not Ekle</h3>
                  </div>
                  <form method="POST" action="operation/Operation.php">
                    <div class="card-body">
                      <div class="form-group">
                        <label>Konu</label>
                        <input type="text" class="form-control" placeholder="Not Konu">
                      </div>
                      <div class="form-group">
                        <label>Açıklama</label>
                        <input type="text" class="form-control" placeholder="Not Açıklama">
                      </div>
                    </div>
                    <div class="card-footer">
                      <button type="submit" class="btn btn-success">Ekle</button>
                    </div>
                  </form>
                </div>
              <?php } ?>
          <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Notlar</h3>

                <div class="card-tools">
                  <a href="Home.php?see=success"><button class="btn btn-success">Yeni Not Ekle</button></a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th></th>
                      <th>Kullanıcı</th>
                      <th>Tarih</th>
                      <th>Başlık</th>
                      <th>Açıklama</th>
                      <th>Notu Sil</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><i class="fas fa-check-circle"></i></td>
                      <td>John Doe</td>
                      <td>11-7-2014</td>
                      <td><span class="tag tag-success">Approved</span></td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                      <td><a href="operation/Operation.php"><button class="btn btn-danger"><i class="fas fa-trash"></i></button></a></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
  </div>
<?php
include "Footer.php";
    
