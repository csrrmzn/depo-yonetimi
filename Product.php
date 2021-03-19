<?php
include "Header.php";
$db=new \vivense\db\Database();

?>

<!-- Ürün Listesini Göster -->


<table class="table table-bordered">
  <thead>
  <div class="mb-2 ">
  <a href="productsadd.php"><button class="btn btn-success btn-sm">Yeni Ürün Ekle</button></a>
  </div>
  </thead>
  <thead class="thead-light">

    <tr>
      <th scope="col">Sıra</th>
      <th scope="col">Ürün ID</th>
      <th scope="col">Ürün Adı</th>
      <th scope="col">Fiyat</th>
      <th scope="col">Açıklama</th>
      <th colspan="2" scope="col">İçerik</th>
      <th scope="col">Kategori</th>
      <th colspan="2" scope="col">İşlemler</th>

    </tr>
  </thead>
      <?php
          $myQuery=$db->getRows("SELECT product.*, category.* FROM product INNER JOIN category ON product.CategoryId=category.CategoryId");
            foreach ($myQuery as $items) { ?>
  <tbody>
      <tr>
        <th scope="row"><?=$items->ProductId;?></th>
        <td><?=$items->ProductUniqid;?></td>
        <td><?=$items->ProductName;?></td>
        <td><?=$items->ProductPrice;?></td>
        <td><?=$items->ProductDescription;?></td>
        <td colspan="2"><?=$items->ProductContent;?></td>
        <td><?=$items->CategoryName;?></td>
        <td style="width: 12%;">
        <a href="Operation.php?ProductId=<?=$items->ProductId;?>"><button class="btn btn-primary btn-sm">Düzenle</button></a>
        <a href="Operation.php?ProductId=<?=$items->ProductId;?>"><button class="btn btn-danger btn-sm">Sil</button></a>
        </td>
      </tr>
  </tbody>
  <? } ?>
</table>


<?php
include "Footer.php";
?>