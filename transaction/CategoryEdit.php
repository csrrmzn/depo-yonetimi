<?php
include "../Header.php";
include "../SideBar.php";
?>
<div class="content-wrapper ">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kategori Düzenle</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../Index.php">Anasayfa</a></li>
              <li class="breadcrumb-item active">Kategori Düzenle</li>
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
              <h3 class="card-title">Kategori Düzenle</h3>
              <div class="card-tools">

              </div>
            </div>
            <?php
                $categoryId=$_GET["CategoryId"];
                $categoryEdit=$db->getRows("SELECT * FROM category  WHERE CategoryId=?",array("$categoryId"));
                    foreach ($categoryEdit as $itemsValue) {
                    
            ?>
            <form action="" method="POST">
                <div class="card-body">
                <div class="form-group">
                    <label for="categoryUniqid">Kategori ID</label>
                    <input type="text" value="<?=$itemsValue->CategoryUniqid;?>" required="required" name="categoryUniqid" class="form-control">
                </div>
                <div class="form-group">
                    <label for="categoryName">Kategori Adı</label>
                    <input type="text" value="<?=$itemsValue->CategoryName;?>" required="required" name="categoryName" class="form-control">
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
                    $categoryId=$_GET["CategoryId"];
                    $categoryUniqid=security($_POST["categoryUniqid"]);
                    $categoryName=security($_POST["categoryName"]);

                    $editCategory=$db->Update("UPDATE category SET
                                        CategoryUniqid=?,
                                        CategoryName=?
                                        WHERE CategoryId=?",array(
                                        $categoryUniqid,
                                        $categoryName,
                                        $categoryId
                                        ));
                    if ($editCategory>0) {
                        go("Category.php");
                    }
                    
                }
            ?>
          </div>
        </div>
      </div>
    </section>
</div>
<?php
include "../Footer.php";