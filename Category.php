<?php
include "header.php";

$kategorisor = $db->prepare("SELECT * FROM category");
$kategorisor->execute();


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

        <?php
        $say = 1;
        while ($kategoricek = $kategorisor->fetch(PDO::FETCH_ASSOC)) {
        ?>

            <tr>
                <th scope="row"><?= $say++; ?></th>
                <td><?php echo $kategoricek['category_uniqid'] ?></td>
                <td><?php echo $kategoricek['category_name'] ?></td>
                <td align="middle" ><a href="lib/user-operations.php?category_id=<?php echo $kategoricek['category_id']; ?>&categorydelete=ok"><button class="btn btn-danger btn">Sil</button></a></td>

            </tr>

        <?php } ?>

    </tbody>
</table>


<?php

include "footer.php";

?><?php
include "header.php";

$kategorisor = $db->prepare("SELECT * FROM category");
$kategorisor->execute();


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

        <?php
        $say = 1;
        while ($kategoricek = $kategorisor->fetch(PDO::FETCH_ASSOC)) {
        ?>

            <tr>
                <th scope="row"><?= $say++; ?></th>
                <td><?php echo $kategoricek['category_uniqid'] ?></td>
                <td><?php echo $kategoricek['category_name'] ?></td>
                <td align="middle" ><a href="lib/user-operations.php?category_id=<?php echo $kategoricek['category_id']; ?>&categorydelete=ok"><button class="btn btn-danger btn">Sil</button></a></td>

            </tr>

        <?php } ?>

    </tbody>
</table>


<?php

include "footer.php";

?><?php
include "header.php";

$kategorisor = $db->prepare("SELECT * FROM category");
$kategorisor->execute();


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

        <?php
        $say = 1;
        while ($kategoricek = $kategorisor->fetch(PDO::FETCH_ASSOC)) {
        ?>

            <tr>
                <th scope="row"><?= $say++; ?></th>
                <td><?php echo $kategoricek['category_uniqid'] ?></td>
                <td><?php echo $kategoricek['category_name'] ?></td>
                <td align="middle" ><a href="lib/user-operations.php?category_id=<?php echo $kategoricek['category_id']; ?>&categorydelete=ok"><button class="btn btn-danger btn">Sil</button></a></td>

            </tr>

        <?php } ?>

    </tbody>
</table>


<?php

include "footer.php";

?><?php
include "header.php";

$kategorisor = $db->prepare("SELECT * FROM category");
$kategorisor->execute();


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

        <?php
        $say = 1;
        while ($kategoricek = $kategorisor->fetch(PDO::FETCH_ASSOC)) {
        ?>

            <tr>
                <th scope="row"><?= $say++; ?></th>
                <td><?php echo $kategoricek['category_uniqid'] ?></td>
                <td><?php echo $kategoricek['category_name'] ?></td>
                <td align="middle" ><a href="lib/user-operations.php?category_id=<?php echo $kategoricek['category_id']; ?>&categorydelete=ok"><button class="btn btn-danger btn">Sil</button></a></td>

            </tr>

        <?php } ?>

    </tbody>
</table>


<?php

include "footer.php";

?><?php
include "header.php";

$kategorisor = $db->prepare("SELECT * FROM category");
$kategorisor->execute();


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

        <?php
        $say = 1;
        while ($kategoricek = $kategorisor->fetch(PDO::FETCH_ASSOC)) {
        ?>

            <tr>
                <th scope="row"><?= $say++; ?></th>
                <td><?php echo $kategoricek['category_uniqid'] ?></td>
                <td><?php echo $kategoricek['category_name'] ?></td>
                <td align="middle" ><a href="lib/user-operations.php?category_id=<?php echo $kategoricek['category_id']; ?>&categorydelete=ok"><button class="btn btn-danger btn">Sil</button></a></td>

            </tr>

        <?php } ?>

    </tbody>
</table>


<?php

include "footer.php";

?><?php
include "header.php";

$kategorisor = $db->prepare("SELECT * FROM category");
$kategorisor->execute();


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

        <?php
        $say = 1;
        while ($kategoricek = $kategorisor->fetch(PDO::FETCH_ASSOC)) {
        ?>

            <tr>
                <th scope="row"><?= $say++; ?></th>
                <td><?php echo $kategoricek['category_uniqid'] ?></td>
                <td><?php echo $kategoricek['category_name'] ?></td>
                <td align="middle" ><a href="lib/user-operations.php?category_id=<?php echo $kategoricek['category_id']; ?>&categorydelete=ok"><button class="btn btn-danger btn">Sil</button></a></td>

            </tr>

        <?php } ?>

    </tbody>
</table>


<?php

include "footer.php";

?><?php
include "header.php";

$kategorisor = $db->prepare("SELECT * FROM category");
$kategorisor->execute();


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

        <?php
        $say = 1;
        while ($kategoricek = $kategorisor->fetch(PDO::FETCH_ASSOC)) {
        ?>

            <tr>
                <th scope="row"><?= $say++; ?></th>
                <td><?php echo $kategoricek['category_uniqid'] ?></td>
                <td><?php echo $kategoricek['category_name'] ?></td>
                <td align="middle" ><a href="lib/user-operations.php?category_id=<?php echo $kategoricek['category_id']; ?>&categorydelete=ok"><button class="btn btn-danger btn">Sil</button></a></td>

            </tr>

        <?php } ?>

    </tbody>
</table>


<?php

include "footer.php";

?><?php
include "header.php";

$kategorisor = $db->prepare("SELECT * FROM category");
$kategorisor->execute();


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

        <?php
        $say = 1;
        while ($kategoricek = $kategorisor->fetch(PDO::FETCH_ASSOC)) {
        ?>

            <tr>
                <th scope="row"><?= $say++; ?></th>
                <td><?php echo $kategoricek['category_uniqid'] ?></td>
                <td><?php echo $kategoricek['category_name'] ?></td>
                <td align="middle" ><a href="lib/user-operations.php?category_id=<?php echo $kategoricek['category_id']; ?>&categorydelete=ok"><button class="btn btn-danger btn">Sil</button></a></td>

            </tr>

        <?php } ?>

    </tbody>
</table>


<?php

include "footer.php";

?>