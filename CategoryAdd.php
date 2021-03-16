<?php

include "header.php";

?>


<h3>Kategori Ekleme</h3>
<hr>

<form action="lib/user-operations.php" method="POST">

    <div class="form-group">
        <div class="col-md-3">
            <label for="exampleInputEmail1">IniqID</label>
        </div>
        <div class="col-md-6">
            <input type="text" class="form-control" name="category_uniqid">
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-3">
            <label for="exampleInputEmail1">Name</label>
        </div>
        <div class="col-md-6">
            <input type="text" class="form-control" name="category_name">
        </div>
    </div>

    <div align="right" class="col-md-6">
        <button type="submit" class="btn btn-primary" name="categoryadd">Kategori Ekle</button>
    </div>
</form>



<?php

include "footer.php";

?>