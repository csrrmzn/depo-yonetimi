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
            <h1 class="m-0">Ürün Kategorileri</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="Index.php">Anasayfa</a></li>
              <li class="breadcrumb-item active">Ürün Kategoriler</li>
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
                <h3 class="card-title"><a href="CategoryAdd.php"><button class="btn btn-success">Yeni Kategori Ekle</button></a></h3>
                <div class="card-tools col-md-6">
                    <h6>
                      <?php
                        if (@$_SESSION["deletecategoryconfirm"]==true) {?>
                            <div class="alert alert-success">
                            <?=$_SESSION["categorymessage"]." "."Numaralı Ürün Silindi";
                              unset($_SESSION["deletecategoryconfirm"]);
                              unset($_SESSION["categorymessage"]);
                            ?>
                            </div>
                      <?}?>
                    </h6>
                </div>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>Sıra</th>
                  <th>Kategori ID</th>
                  <th>Kategori Adı</th>
                  <th>Kategoriye Ait Ürün Sayısı</th>
                  <th>İşlemler</th>
                  </tr>
                  </thead>
                    <?php
                      $myQuery=$db->getRows("SELECT * FROM category");
                        foreach ($myQuery as $items) {
                        $number=$items->CategoryId;
                        
                      $recordsCategory=$db->getColumn("SELECT COUNT(CategoryName) FROM product INNER JOIN category ON product.CategoryId=category.CategoryId WHERE product.CategoryId=?",array($number));
                    ?>
                  <tbody>
                  <tr>
                  <th><?=$items->CategoryId?></th>
                  <td><?=$items->CategoryUniqid?></td>
                  <td><?=$items->CategoryName;?></td>
                  <td><?=$recordsCategory;?></td>
                  <td align="middle" >
                  <a href="CategoryEdit.php?CategoryId=<?=$items->CategoryId;?>"><button class="btn btn-primary btn-sm">Düzenle</button></a>
                  <a href="Operation.php?CategoryId=<?=$items->CategoryId;?>"><button class="btn btn-danger btn-sm">Sil</button></a>
                  </td>
                  </tr>
                  </tbody>
                  <?php } ?>
                  <tfoot>
                  <tr>
                  <th>Sıra</th>
                  <th>Kategori ID</th>
                  <th>Kategori Adı</th>
                  <th>İşlemler</th>
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
?>