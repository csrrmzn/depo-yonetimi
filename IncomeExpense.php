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
                    <h1 class="m-0">Fiyat Yönetimi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="Index.php">Anasayfa</a></li>
                    <li class="breadcrumb-item active">Fiyat Yönetimi</li>
                    </ol>
                </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <button class="btn btn-success">Ürün Düzenle</button>
                            <div class="card-tools">
                                <ul class="nav nav-pills ml-auto">
                                    <li class="nav-item">
                                    <form action="" method="POST">
                                        <select name="category" class="form-control">
                                        <?php
                                            $myQuery0=$db->getRows("SELECT * FROM category ");
                                                foreach ($myQuery0 as $items0) {                   
                                        ?>
                                        <option value="<?php echo $items0->Category_Id; $ıd=$items0->Category_Id;?>"><?php echo $items0->Category_Name; ?></option>
                                        
                                        <?php } ?>
                                        
                                        </select>
                                        
                                    </li>
                                    <li class="nav-item">
                                    <button class="btn btn-primary" type="submit" name="categorysend">Listele</button>
                                        </form>
                                    </li>
                                <li>
                                <form method="POST" action="Download.php">
                                    <div class="card-tools">
                                        <a href="Export.php">
                                        <button class="btn btn-success" name="export">Excel İndir</button>
                                        </a>
                                    </div>
                                </form>
                                </li>
                                </ul>
                            </div>
                        </div>
                        <div id="dvjson">
                        <div id="content" style="background-color: white;">
                            <div class="card-body">
                            <table id="table2excel" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Ürün ID</th>
                                <th>Ürün Adı</th>
                                <th>Ürün Alış Fiyatı</th>
                                <th>Ürün Satış Fiyatı(min)</th>
                                <th>İşlemler</th>
                            </tr>
                            </thead>
                                <?php
                                    if (!isset($_POST["categorysend"])) {
                                        $categoryId=1;             
                                    }else {
                                            $categoryId=$_POST["category"];
                                    }
                                        $myQuery=$db->getRows("SELECT * FROM product INNER JOIN category ON product.Category_Id=category.Category_Id WHERE product.Category_Id=?",array($categoryId));
                                            foreach ($myQuery as $items) {     
                                ?>                
                            <tbody>
                            <tr>
                                <td><?php echo $items->Product_Uniqid;?></td>
                                <td><?php echo $items->Product_Name;?></td>
                                <td><?php echo $items->Product_PurchasePrice;?></td>
                                <td><?php echo $items->Product_SellPrice;?></td>
                                <td style="width: 12%;">
                                <a href="operation/Operation.php?ProductId=<?php echo $items->Product_Id;?>"><button class="btn btn-danger btn-sm">Sil</button></a>
                                </td>
                            </tr>
                            </tbody>
                            <?php } ?>
                            <tfoot>
                            <tr>
                                <th>Ürün ID</th>
                                <th>Ürün Adı</th>
                                <th>Ürün Alış Fiyatı</th>
                                <th>Ürün Satış Fiyatı(min)</th>
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