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
            <h1 class="m-0">Excel İle Ürün Yükleme</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="Index.php">Anasayfa</a></li>
              <li class="breadcrumb-item active">Excel İle Ürün Yükleme</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
   <section class="content">
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h6>
                  <?php
                        if (@$_GET["confirm"]=="successful") {?>
                            <div class="alert alert-success">
                              Excel Dosyası Aktarıldı
                            </div>
                      <?php }elseif (@$_GET["confirm"]=="unsuccessful") { ?>
                            <div class="alert alert-danger">
                              Excel Dosyası Aktarılamadı
                            </div>
                    <?php }elseif (@$_GET["confirm"]=="error") { ?>
                            <div class="alert alert-danger">
                              Excel Dosyası Seçilemedi
                            </div>
                    <?php }?>
                </h6>
                <div class="card-tools">
                  <div class="outer-container">
                    <form action="operation/Export-ImportOperation.php" method="POST" name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
                  <div>
                    <label>Excel Dosyasını Seç</label>
                    <input type="file" name="file" id="file" accept=".xls,.xlsx">
                    <button type="submit" id="submit" name="import" class="btn btn-success">Ürünleri Yükle</button>
                  </div>
                    </form>
                </div>
                  <!--<ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                        <form action="operation/Export-ImportOperation.php" method="POST" enctype="multipart/form-data">
                            <div class="custom-file">
                                <label class="custom-file-label" for="customFile">Excel Dosyasını Seç</label>
                                <input type="file" name="file" id="file" accept=".xls,.xlsx" class="custom-file-label">
                            </div>
                    </li>
                    <li class="nav-item">
                            <button type="submit" name="ımport" class="btn btn-success">Veritabanına Aktar</button>
                        </form>
                    </li>
                  </ul>-->
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Ürün ID</th>
                    <th>Ürün Adı</th>
                    <th>Ürün Alış Fiyatı</th>
                    <th>Ürün Satış Fiyatı</th>
                    <th>Ürün Açıklama</th>
                    <th>Kategori Adı</th>
                  </tr>
                  </thead>
                  <?php
                      $myQuery=$db->getRows("SELECT * FROM product INNER JOIN category ON
                                    product.CategoryId=category.CategoryId LIMIT 10");
                                    
                                    foreach ($myQuery as $items) {     
                  ?>
                  <tbody>
                  <tr>
                    <td><?=$items->ProductUniqid;?></td>
                    <td><?=$items->ProductName;?></td>
                    <td><?=$items->ProductPurchasePrice;?></td>
                    <td><?=$items->ProductSellPrice;?></td>
                    <td><?=$items->ProductContent;?></td>
                    <td><?=$items->CategoryName;?></td>
                  </tr>
                  </tbody>
                  <?php } ?>
                  
                  <tfoot>
                  <tr>
                    <th>Ürün ID</th>
                    <th>Ürün Adı</th>
                    <th>Ürün Alış Fiyatı</th>
                    <th>Ürün Satış Fiyatı</th>
                    <th>Ürün Açıklama</th>
                    <th>Kategori Adı</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            </div>
        </div>
      </div>
    </section>
</div>
<?php
include "Footer.php";