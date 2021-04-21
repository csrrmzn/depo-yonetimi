<?php
include "Header.php";
include "SideBar.php";
?>

  <div class="content-wrapper ">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Ürün Ekle</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="Index.php">Anasayfa</a></li>
              <li class="breadcrumb-item active">Ürün Ekle</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <div class="col-md-6">
      <?php
          if (isset($_GET["Confirm"]) && $_GET["Confirm"]=="addproduct1") { ?>
              <div class="alert alert-success">
                Yeni Ürün Eklendi
              </div>
          <?php }elseif (isset($_GET["Confirm"]) && $_GET["Confirm"]=="unaddproduct0") { ?>
            <div class="alert alert-danger">
                Yeni Ürün Eklenemedi Lütfen Tekrar Deneyiniz
            </div>
         <?php } ?>
    </div>
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Yeni Ürün</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <form action="operation/Operation.php" method="POST">
                <div class="card-body">
                <div class="form-group">
                    <label for="productUniqid">Ürün ID</label>
                    <input type="text" required="required" name="productUniqid" class="form-control">
                </div>
                <div class="form-group">
                    <label for="ProductName">Ürün Adı</label>
                    <input type="text" required="required" name="productName" class="form-control">
                </div>
                <div class="form-group">
                    <label for="productPurchasePrice">Alış fiyatı</label>
                    <input type="text" required="required" name="productPurchasePrice" class="form-control">
                </div>
                <div class="form-group">
                    <label for="productSellPrice">Satış Fiyatı(min)</label>
                    <input type="text" required="required" name="productSellPrice" class="form-control">
                </div>
                <div class="form-group">
                    <label for="productContent">Ürün Açıklama</label>
                    <textarea name="productContent" required="required" class="form-control" rows="4"></textarea>
                </div>
                <div class="form-group">
                    <label for="categoryId">Kategori</label>
                    <select name="categoryId" required="required" class="form-control">
                        <?php
                            $category=$db->getRows("SELECT * FROM category");
                            foreach ($category as $categorySelect) {                   
                        ?>
                          <option value="<?=$categorySelect->Category_Id;?>"><?=$categorySelect->Category_Name;?></option>  
                        <?php } ?>
                    </select>
                </div>
                <div>
                <button type="submit" name="addproduct" class="btn btn-success float-right">Ekle</button>
                </div>
                </div>
            </form>
          </div>
        </div>
        <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Son 10 Ürün Kaydı</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Ürün ID</th>
                      <th>Ürün Adı</th>
                      <th>Ürün Tanımı</th>
                      <th>Kategori</th>
                    </tr>
                  </thead>
                  <?php
                    $myQuery=$db->getRows("SELECT * FROM product INNER JOIN category ON product.CategoryId=category.CategoryId ORDER BY ProductName ASC LIMIT 10");
                                foreach ($myQuery as $items) {
                                    
                  ?>
                  <tbody>
                    <tr>
                      <td><?=$items->Product_Uniqid;?></td>
                      <td><?=$items->Product_Name;?></td>
                      <td><?=$items->Product_Content;?></td>
                      <td><?=$items->Category_Name;?></td>
                    </tr>
                  </tbody>
                  <?php } ?>
                </table>
              </div>
            </div>
        </div>
      </div>
    </section>
</div>
<?php
include "Footer.php";