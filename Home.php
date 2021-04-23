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
              $recordsProdcut=$db->getColumn("SELECT COUNT(Product_Id) FROM product");
              $recordsCategory=$db->getColumn("SELECT COUNT(Category_Id) FROM category");
              $recordsPPP=$db->getColumn("SELECT SUM(Product_PurchasePrice) FROM product");
              $recordsPSP=$db->getColumn("SELECT SUM(Product_SellPrice) FROM product");
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
                        <input type="text" name="notesubject" class="form-control" placeholder="Not Konu">
                      </div>
                      <div class="form-group">
                        <label>Açıklama</label>
                        <input type="text" name="notedescription" class="form-control" placeholder="Not Açıklama">
                      </div>
                    </div>
                    <div class="card-footer">
                      <button type="submit" name="addnote" class="btn btn-success">Ekle</button>
                    </div>
                  </form>
                </div>
              <?php } ?>
          <div class="row">
            <div class="col-md-12 text-center">
              <?php
                if (isset($_GET) && isset($_GET["confirm"]))
                {
                    $confirm=$_GET["confirm"];
                    switch ($confirm) {
                      case 'addnote': ?>
                        <div class="alert alert-success">
                          Not Eklendi
                        </div>
                      <?php break; ?>
                    <?php case 'notaddnote': ?>
                        <div class="alert alert-danger">
                          Not Eklenemedi
                        </div>
                      <?php break; ?>
                    <?php case 'deletenote': ?>
                        <div class="alert alert-success">
                          Not Silindi
                        </div>
                      <?php break; ?>
                    <?php case 'notdeletenote': ?>
                        <div class="alert alert-danger">
                          Not Silinemedi
                        </div>
                      <?php break;
                    }
                }   
              ?>
            </div>
          </div>
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
                  <?php
                    $notes=$db->getRows("SELECT * FROM notes INNER JOIN users ON
                                    notes.User_Id=users.User_Id");
                          foreach ($notes as $item) {
                  ?>
                  <tbody>
                    <tr>
                      <td><i class="fas fa-check-circle"></i></td>
                      <td><?=$item->User_Name;?></td>
                      <td><?=$item->Note_AddTime;?></td>
                      <td><span class="tag tag-success"><?=$item->Note_Subject;?></span></td>
                      <td><?=$item->Note_Description;?></td>
                      <td><a href="operation/Operation.php?noteıd=<?=$item->Note_Uniqid;?>"><button class="btn btn-danger"><i class="fas fa-trash"></i></button></a></td>
                    </tr>
                  </tbody>
                  <?php } ?>
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
    
