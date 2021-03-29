<?php
include "Header.php";
include "SideBar.php";
?>
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Yeni Kategori</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="Index.php">Anasayfa</a></li>
              <li class="breadcrumb-item active">Kategori Ekleme</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <?php
          if (@$_GET["confirm"]==1) { ?>
              <div class="alert alert-success">
                Yeni Kategori Eklendi
              </div>
          <?php }elseif (@$_GET["confirm"]==0) { ?>
            <div class="alert alert-success">
                Yeni Kategori Eklenemedi Lütfen Tekrar Deneyiniz
            </div>
         <?php } ?>
    </div>
   <section class="content">
      <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
                <section class="content">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                <h3 class="card-title">Yeni Kategori</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                                </div>
                                <form action="operation/Operation.php" method="POST">
                                <div class="card-body">
                                <div class="form-group">
                                    <label for="categoryUniqid">Kategori ID</label>
                                    <input type="text" name="categoryUniqid" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="categoryName">Kategori Name</label>
                                    <input type="text" name="categoryName" class="form-control" ></input>
                                </div>
                                <div class="col-md-12">
                                    <a href="operation/Operation.php"><button type="button" name="addcategory" class="btn btn-success" data-card-widget="collapse" title="Collapse">Ekle</button></a>
                                </div>
                                </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card card-secondary">
                                <div class="card-header">
                                <h3 class="card-title">Kategoriler</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                                </div>
                                <div class="card-body">
                                <table  class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                    <th>Sıra</th>
                                    <th>Kategori ID</th>
                                    <th>Kategori Adı</th>
                                    <th>Alt Kategoriler</th>
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
                                        </form>
                                    </td>
                                    </tr>
                                    </tbody>
                                    <?php } ?>
                                    <tfoot>
                                    <tr>
                                    <th>Sıra</th>
                                    <th>Kategori ID</th>
                                    <th>Kategori Adı</th>
                                    <th>Ürün Sayısı</th>
                                    </tr>
                                    </tfoot>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>
</div>



<?php
include "Footer.php";