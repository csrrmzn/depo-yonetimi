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
                                <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Kategori ID</label>
                                    <input type="text" id="inputName" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">Kategori Name</label>
                                    <input id="inputDescription" class="form-control" ></input>
                                </div>
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-success" data-card-widget="collapse" title="Collapse">Ekle</button>
                                </div>
                                </div>
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
                                    <th>Ürün Sayısı</th>
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
                                    </tr>
                                    </tbody>
                                    <?php } ?>
                                    <tfoot>
                                    <tr>
                                    <th>Sıra</th>
                                    <th>Kategori ID</th>
                                    <th>Kategori Adı</th>
                                    <th>Ürün Sayısır</th>
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