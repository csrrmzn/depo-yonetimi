<?php
include "Header.php";
if (isset($_SESSION["LogedIn"])==true) {
    go("Category.php");
}else {
    go("Index.php");
}
?>

<!-- Kategori Listesini Göster -->


<table class="table table-bordered">
    <thead>
    <div class="mb-2 ">
    <a href="categoryadd.php"><button class="btn btn-success btn">Yeni Kategori Ekle</button></a>
    </div>
    </thead>
    <thead class="thead-light">

        <tr>
            <th scope="col">Sıra</th>
            <th scope="col">Kategori ID</th>
            <th scope="col">Kategori Adı</th>
            <th scope="col">İşlemler</th>
        </tr>
    </thead>

    <tbody>
            <tr>
                <th scope="row"></th>
                <td></td>
                <td>></td>
                <td align="middle" ><a href=""><button class="btn btn-danger btn">Sil</button></a></td>

            </tr>
    </tbody>
</table>


<?php
include "Footer.php";
?>