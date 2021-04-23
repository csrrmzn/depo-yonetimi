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
            <h1 class="m-0">Hesabım</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="Index.php">Anasayfa</a></li>
              <li class="breadcrumb-item active">Hesabım</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <div class="card-tools col-md-12 text-center">
      <h6>
      <?php
          @$get=$_GET["confirm"];
          switch ($get)
        {
          case 'successful': ?>
            <div class="alert alert-success">
              Bilgileriniz Düzenlendi
            </div>
          <?php break;
          case 'unsuccessful': ?>
          <div class="alert alert-danger">
            Beklenmedik Bir Hata Oluştu! Bilgileriniz Düzenlenemedi
          </div>
          <?php break;
          case 'empty': ?>
            <div class="alert alert-danger">
              Lütfen Tüm Bilgilerinizi Eksiksiz Doldurunuz
            </div>
          <?php break;
        } ?>
      </h6>
    </div>
   <section class="content">
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Kullanıcı İşlemleri</h3>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <?php
                    $username=$_SESSION["username"];
                  $myQuery=$db->getRows("SELECT * FROM users WHERE User_Name=?",array($username));
                              foreach ($myQuery as $items) {
                                $pass=$items->User_Password;
                                $decodepass=base64_decode($pass);
                  ?>
                  <tr>
                    <th>Adınız</th>
                    <th>Soyadınız</th>
                    <th>Şifreniz</th>
                    <th>Güvenlik Kodunuz</th>
                    <th>Telefon Numaranız</th>
                    <th>E-posta Adresiniz</th>
                    <th>Doğum Tarihiniz</th>
                    <th>İşlemler</th>

                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td><?=$items->User_Name;?></td>
                    <td><?=$items->User_Lastname;?></td>
                    <td><?=$decodepass;?></td>
                    <td><?=$items->User_SecretCode;?></td>
                    <td><?=$items->User_Phone?></td>
                    <td><?=$items->User_Email;?></td>
                    <td><?=$items->User_Birtday;?></td>
                    <td >
                    <a href="MyAccountEdit.php"><button class="btn btn-primary" >Düzenle</button></a>
                    <a href="operation/UserOperation/EditMyAccount.php?UserId=<?php echo $items->User_Id;?>" ><button class="btn btn-danger" name="deletemyaccount">Hesabımı Sil</button ></a>
                    </td>
                  </tr>
                  <?php } ?>
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