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
                        if (@security($_GET["confirm"]=="okdelete")) { ?>
                          <div class="alert alert-success">
                            Kategori Silindi
                          </div>
                        <?php }elseif (@security($_GET["confirm"]=="nodelete")) { ?>
                          <div class="alert alert-danger">
                            Kategori Silinemedi
                          </div>
                        <?php }elseif (@security($_GET["confirm"]=="categoryeditno")) { ?>
                          <div class="alert alert-danger">
                            Kategori Düzenlenemedi
                          </div>
                        <?php }elseif (@security($_GET["confirm"]=="categoryeditok")) { ?>
                          <div class="alert alert-success">
                            Kategori Düzenlendi
                          </div>
                        <?php } ?>
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
                  <th><?php echo $items->Category_Id;?></th>
                  <td><?php echo $items->Category_Uniqid;?></td>
                  <td><?php echo $items->Category_Name;?></td>
                  <td><?php echo $recordsCategory;?></td>
                  <td align="middle" >
                  <a href="CategoryEdit.php?CategoryId=<?php echo $items->Category_Id;?>"><button class="btn btn-primary btn-sm">Düzenle</button></a>
                  <a href="operation/Operation.php?CategoryId=<?php echo $items->Category_Id;?>"><button class="btn btn-danger btn-sm">Sil</button></a>
                  </td>
                  </tr>
                  </tbody>
                  <?php } ?>
                  <tfoot>
                  <tr>
                  <th>Sıra</th>
                  <th>Kategori ID</th>
                  <th>Kategori Adı</th>
                  <th>Kategoriye Ait Ürün Sayısı</th>
                  <th>İşlemler</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
            </div>
            </div>
        </div>
      </div>
    </section>
</div>
<?php
include "Footer.php";