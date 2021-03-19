<?php
include "Header.php";
$db=new \vivense\db\Database();
?>

<!-- Kategori Listesini Göster -->


<table class="table table-bordered">
    <thead>
    <div class="mb-2 ">
    <a href="categoryadd.php"><button class="btn btn-success btn-sm">Yeni Kategori Ekle</button></a>
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
        <?php
          $myQuery=$db->getRows("SELECT * FROM category");
            foreach ($myQuery as $items) { ?>
    <tbody>
            <tr>
                <th scope="row"><?=$items->CategoryId?></th>
                <td><?=$items->CategoryUniqid?></td>
                <td><?=$items->CategoryName;?></td>
                <td align="middle" >
                <a href="Operation.php?CategoryId=<?=$items->CategoryId;?>"><button class="btn btn-primary btn-sm">Düzenle</button></a>
                <a href="Operation.php?CategoryId=<?=$items->CategoryId;?>"><button class="btn btn-danger btn-sm">Sil</button></a>
                </td>

            </tr>
    </tbody>
     <? } ?>
</table>


<?php
include "Footer.php";
?>