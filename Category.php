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
                        if (@$_GET["confirm"]==1 && $_GET["categoryId"]) {
                            $getCategoryId=$_GET["categoryId"];
                          ?>
                            <div class="alert alert-success">
                            <?=$getCategoryId." "."Numaralı Kategori Silindi";
                            ?>
                            </div>
                      <?}?>
                      <?php
                        /*if (@$_SESSION["deletecategoryconfirm"]==true) {?>
                            <div class="alert alert-success">
                            <?=$_SESSION["categorymessage"]." "."Numaralı Ürün Silindi";
                              unset($_SESSION["deletecategoryconfirm"]);
                              unset($_SESSION["categorymessage"]);
                            ?>
                            </div>
                      <?}*/?>
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
                  <th>Alt Kategoriler</th>
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
                  <td>
                    <form action="" method="POST">
                        <select name="category" class="form-control">
                          <?php
                            $subCategory=$db->getRows("SELECT * FROM sub_category INNER JOIN category ON sub_category.CategoryId=category.CategoryId WHERE category.CategoryId=?",array($number));
                                          foreach ($subCategory as $itemsSubCategory) {                   
                          ?>
                          <option value="<?=$itemsSubCategory->SubCategoryId;?>"><?=$itemsSubCategory->SubCategoryName; ?></option>
                          <? } ?> 
                        </select>
                    </li>
                    </form>
                  </td>
                  <td align="middle" >
                  <a href="CategoryEdit.php?CategoryId=<?=$items->CategoryId;?>"><button class="btn btn-primary btn-sm">Düzenle</button></a>
                  <a href="operation/Operation.php?=$items->CategoryId;?>"><button class="btn btn-danger btn-sm">Sil</button></a>
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
                  <th>Alt Kategoriler</th>
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