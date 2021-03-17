<?php
include "Header.php";
if (isset($_SESSION["LogedIn"])==true) {
    go("Product.php");
}else {
    go("Index.php");
}
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
      <tr>
        <th scope="row"></th>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td colspan="2">

            // metin kısaltması yapıldı

           </td>
        <td></td>
        <td style="width: 12%;">
        <a href=""><button class="btn btn-primary btn-sm">Düzenle</button></a>
        <a href=""><button class="btn btn-danger btn-sm">Sil</button></a>
        </td>
        

      </tr>

  </tbody>
</table>


<?php

include "Footer.php";

?>