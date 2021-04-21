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
            <h1 class="m-0">Toplu Ürün İndirme</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="Index.php">Anasayfa</a></li>
              <li class="breadcrumb-item active">Toplu Ürün İndirme</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-12">
        <ul class="nav nav-pills ml-2">
            <li class="nav-item">
                <form action="" method="POST">
                    <select name="category" class="form-control">
                        <?php
                            $myQuery0=$db->getRows("SELECT * FROM category ");
                                          foreach ($myQuery0 as $items0) {                   
                        ?>
                          <option value="<?php echo $items0->Category_Id;?>"><?php echo $items0->Category_Name; ?></option>
                        <?php } ?> 
                    </select>
            </li>
            <li class="nav-item">
                <button class="btn btn-primary" type="submit" name="categorysend">Ürünleri Listele</button>
                </form>
            </li>
        </ul>
    </div>
   <section class="content">
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                  <li class="nav-item mr-5">
                    <h6>
                      <?php
                        if (@$_GET["confirm"]=="successful") {?>
                            <div class="alert alert-success">
                              Excel Dosyası İndirildi
                            </div>
                      <?php }elseif (@$_GET["confirm"]=="unsuccessful") { ?>
                            <div class="alert alert-danger">
                              Excel Dosyası İndiriemedi
                            </div>
                      <?php }?>
                    </h6>
                  </li>
                    <li class="nav-item">
                      <form action="operation/Export-ImportOperation/Export-ImportOperation.php" method="POST">
                        <select name="category" class="form-control">
                          <?php
                            $myQuery0=$db->getRows("SELECT * FROM category ");
                                          foreach ($myQuery0 as $items0) {                   
                          ?>
                          <option value="<?php echo $items0->Category_Id;?>"><?php echo $items0->Category_Name; ?></option>
                          <?php } ?> 
                        </select>
                    </li>
                    <li class="nav-item">
                      <button class="btn btn-success" type="submit" name="export">Ürünleri İndir</button>
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
                  </tr>
                  </thead>
                  <?php
                      if (!isset($_POST["categorysend"])) {
                          $categoryId=1;             
                      }else {
                            $categoryId=security($_POST["category"]);
                      }
                      $myQuery=$db->getRows("SELECT * FROM product INNER JOIN category ON
                                    product.CategoryId=category.CategoryId WHERE
                                    product.CategoryId=?",array(
                                    $categoryId));
                                    
                                    foreach ($myQuery as $items) {     
                  ?>
                  <tbody>
                  <tr>
                    <td><?php echo $items->Product_Uniqid;?></td>
                    <td><?php echo $items->Product_Name;?></td>
                    <td><?php echo $items->Product_PurchasePrice;?></td>
                    <td><?php echo $items->Product_SellPrice;?></td>
                    <td><?php echo $items->Product_Content;?></td>
                    <td><?php echo $items->Category_Name;?></td>
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