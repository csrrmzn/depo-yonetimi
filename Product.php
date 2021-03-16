<?php
include "header.php";

$productsor = $db->prepare("SELECT product.*, category.* 
FROM product INNER JOIN category 
ON product.category_id=category.category_id
");
$productsor->execute();

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

  <tbody>

    <?php
    $say = 1;
    while ($productcek = $productsor->fetch(PDO::FETCH_ASSOC)) {
    ?>

      <tr>
        <th scope="row"><?= $say++; ?></th>
        <td><?php echo $productcek['product_uniqid'] ?></td>
        <td><?php echo $productcek['product_name'] ?></td>
        <td><?php echo $productcek['product_price'] ?></td>
        <td><?php echo $productcek['product_description'] ?></td>
        <td colspan="2"><?php

            // metin kısaltması yapıldı
            $content = $productcek['product_content'];
            $uzunluk = strlen($content);
            $limit = 250;
            if ($uzunluk > $limit) {
              $content = substr($content, 0, $limit) . " <b>devamı var...</b>";
              echo $content;
            }else {
              echo $content;
            }

            ?></td>
        <td><?php echo $productcek['category_name'] ?></td>
        <td style="width: 12%;">
        <a href="productsedit.php?product_id=<?php echo $productcek['product_id']; ?>"><button class="btn btn-primary btn-sm">Düzenle</button></a>
        <a href="lib/user-operations.php?product_id=<?php echo $productcek['product_id']; ?>&productdelete=ok"><button class="btn btn-danger btn-sm">Sil</button></a>
        </td>
        

      </tr>

    <?php } ?>

  </tbody>
</table>


<?php

include "footer.php";

?>