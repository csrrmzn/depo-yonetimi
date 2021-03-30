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
            <h1 class="m-0">Ürünler</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="Index.php">Anasayfa</a></li>
              <li class="breadcrumb-item active">Ürünler</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-12 text-center">
    </div>
   <section class="content">
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><a href="ProductAdd.php"><button class="btn btn-success">Yeni Ürün Ekle</button></a></h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                  <li class="nav-item mr-5">
                    <h6>
                      <?php
                        if (@$_GET["confirm"]==1 && $_GET["productId"]) {
                            $getProductId=$_GET["productId"];
                          ?>
                            <div class="alert alert-success">
                            <?php echo $getProductId." "."Numaralı Ürün Silindi"; ?>
                            </div>
                      <?php }?>
                    </h6>
                  </li>
                    <li class="nav-item">
                      <form action="" method="POST">
                        <select name="category" class="form-control">
                          <?php
                            $myQuery0=$db->getRows("SELECT * FROM category ");
                                          foreach ($myQuery0 as $items0) {                   
                          ?>
                          <option value="<?=$items0->CategoryId;?>"><?=$items0->CategoryName; ?></option>
                          <?php } ?> 
                        </select>
                    </li>
                    <li class="nav-item">
                      <button class="btn btn-primary" type="submit" name="categorysend">Listele</button>
                      </form>
                    </li>
                  </ul>
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
                    <th>İşlemler</th>
                  </tr>
                  </thead>
                  <?php
                      if (!isset($_POST["categorysend"])) {
                          $categoryId=2;             
                      }else {
                            $categoryId=$_POST["category"];
                      }
                      $myQuery=$db->getRows("SELECT * FROM product INNER JOIN category ON
                                    product.CategoryId=category.CategoryId WHERE
                                    product.CategoryId=?",array(
                                    $categoryId));
                                    
                                    foreach($myQuery as $items) { ?>
                  <tbody>
                  <tr>
                    <td><?=$items->ProductUniqid;?></td>
                    <td><?=$items->ProductName;?></td>
                    <td><?=$items->ProductPurchasePrice;?></td>
                    <td><?=$items->ProductSellPrice;?></td>
                    <td><?=$items->ProductContent;?></td>
                    <td><?=$items->CategoryName;?></td>
                    <td style="width: 12%;">
                    <a href="ProductEdit.php?ProductId=<?php echo $items->ProductId;?>"><button type="submit" class="btn btn-primary btn-sm">Düzenle</button></a>
                    <a href="operation/Operation.php?Product=1&ProductId=<?php echo $items->ProductId;?>"><button type="submit" class="btn btn-danger btn-sm">Sil</button></a>
                    </td>
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
?>