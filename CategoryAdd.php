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
          if (@security($_GET["confirm"])=="addcategory1") { ?>
              <div class="alert alert-success">
                Yeni Kategori Eklendi
              </div>
          <?php }elseif (@security($_GET["confirm"])=="unaddcategory0") { ?>
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
                                </div>
                                <div class="card-body">

                                <form action="operation/Operation.php" method="POST">
                                    <div class="form-group">
                                        <div class="col-md-3">
                                            <label for="category_uniqid">Kategori ID</label>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" name="category_uniqid">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-3">
                                            <label for="category_name">Kategori Adı</label>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" name="category_name">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-success" name="addCategory">Kategori Ekle</button>
                                    </div>
                                </form>

                                </div>
                            </div>
                        </div>
                        <?php
                            
                        ?>
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
                                    <!--<th>Alt Kategoriler</th>-->
                                    </tr>
                                    </thead>
                                        <?php
                                        $myQuery=$db->getRows("SELECT * FROM category");
                                        foreach ($myQuery as $items) {
                                            $number=$items->Category_Id;
                                            $recordsCategory=$db->getColumn("SELECT COUNT(Category_Name) FROM product INNER JOIN category ON product.Category_Id=category.Category_Id WHERE product.Category_Id=?",array($number));
                                        ?>
                                    <tbody>
                                    <tr>
                                    <th><?php echo $items->Category_Id?></th>
                                    <td><?php echo $items->Category_Uniqid?></td>
                                    <td><?php echo $items->Category_Name;?></td>
                                    <!--<td>
                                        <form action="" method="POST">
                                            <select name="category" class="form-control">
                                            <?php
                                                $subCategory=$db->getRows("SELECT * FROM sub_category INNER JOIN category ON sub_category.Category_Id=category.Category_Id WHERE category.Category_Id=?",array($number));
                                                            foreach ($subCategory as $itemsSubCategory) {                   
                                            ?>
                                            <option value="<?php echo $itemsSubCategory->Sub_Category_Id;?>"><?php echo $itemsSubCategory->Sub_Category_Name; ?></option>
                                            <?php } ?> 
                                            </select>
                                        </form>
                                    </td>-->
                                    </tr>
                                    </tbody>
                                    <?php } ?>
                                    <tfoot>
                                    <tr>
                                    <th>Sıra</th>
                                    <th>Kategori ID</th>
                                    <th>Kategori Adı</th>
                                    <!--<th>Ürün Sayısı</th>-->
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