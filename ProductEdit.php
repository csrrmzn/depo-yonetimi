<?php
include "Header.php";
include "SideBar.php";
?>
<div class="content-wrapper ">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Ürün Düzenle</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="Index.php">Anasayfa</a></li>
              <li class="breadcrumb-item active">Ürün Düzenle</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <div class="col-md-6">
    </div>
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Ürün Düzenle</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <?php
                $productId=$_GET["ProductId"];
                $productEditSelect=$db->getRows("SELECT * FROM product INNER JOIN category ON product.CategoryId=category.CategoryId WHERE ProductId=?",array("$productId"));
                    foreach ($productEditSelect as $itemsValue) {
                    
            ?>
            <form action="" method="POST">
                <div class="card-body">
                <div class="form-group">
                    <label for="productUniqid">Ürün ID</label>
                    <input type="text" value="<?=$itemsValue->Product_Uniqid;?>" required="required" name="productUniqid" class="form-control">
                </div>
                <div class="form-group">
                    <label for="ProductName">Ürün Adı</label>
                    <input type="text" value="<?=$itemsValue->Product_Name;?>" required="required" name="productName" class="form-control">
                </div>
                <div class="form-group">
                    <label for="productPurchasePrice">Alış fiyatı</label>
                    <input type="text" value="<?=$itemsValue->Product_PurchasePrice;?>" name="productPurchasePrice" class="form-control">
                </div>
                <div class="form-group">
                    <label for="productSellPrice">Satış Fiyatı(min)</label>
                    <input type="text" value="<?=$itemsValue->Product_SellPrice;?>" name="productSellPrice" class="form-control">
                </div>
                <div class="form-group">
                    <label for="productContent">Ürün Açıklama</label>
                    <textarea name="productContent" value="<?=$itemsValue->Product_Content;?>" class="form-control" rows="4"></textarea>
                </div>
                <div class="form-group">
                    <label for="categoryId">Kategori</label>
                    <select name="categoryId" required="required" class="form-control">
                        <?php
                            $category=$db->getRows("SELECT * FROM category");
                            foreach ($category as $categorySelect) {                   
                        ?>
                            <option value="<?=$categorySelect->Category_Id;?>" selected="<?=$itemsValue->Category_Id;?>"><?=$categorySelect->Category_Name;?></option>  
                        <?php } ?>
                    </select>
                </div>
                <div>
                <button type="submit" name="edit" class="btn btn-success float-right">Güncelle</button>
                </div>
                </div>
            </form>
            <?php } ?>
            <?php
                if (isset($_POST["edit"]))
                {
                    $ProductId=$_GET["ProductId"];
                    $productUniqid=strip_tags($_POST["productUniqid"]);
                    $productName=strip_tags($_POST["productName"]);
                    $productPurchasePrice=strip_tags($_POST["productPurchasePrice"]);
                    $productSellPrice=strip_tags($_POST["productSellPrice"]);
                    $productContent=strip_tags($_POST["productContent"]);
                    $categoryId=strip_tags($_POST["categoryId"]);

                    $editProduct=$db->Update("UPDATE product SET
                                        ProductUniqid=?,
                                        ProductName=?,
                                        ProductPurchasePrice=?,
                                        ProductSellPrice=?,
                                        ProductContent=?,
                                        CategoryId=? WHERE ProductId=?",array(
                                        $productUniqid,
                                        $productName,
                                        $productPurchasePrice,
                                        $productSellPrice,
                                        $productContent,
                                        $categoryId,
                                        $ProductId
                                        ));

                    
                }
            ?>
          </div>
        </div>
      </div>
    </section>
</div>
<?php
include "Footer.php";