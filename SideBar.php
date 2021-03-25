<?php
require_once("db/Database.class.php");
require_once("function/Function.php");
$db=new \vivense\db\Database();
$value1=basename($_SERVER["PHP_SELF"]);
$value2=basename(__FILE__);
accessBlock($value1,$value2,"Home.php");
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="Index.php" class="brand-link">
      <img src="dist/img/d.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: 10">
      <span class="brand-text font-weight-light">Depo Yönetimi</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="MyAccount.php" class="d-block"><?php echo $_SESSION["username"];?></a>
        </div>
      </div>
      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Ara" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="Index.php" class="nav-link ">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Anasayfa
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="Product.php" class="nav-link ">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Ürünler
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="Category.php" class="nav-link">
              <i class="nav-icon fas fa-ellipsis-h"></i>
              <p>
                Kategoriler
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="IncomeExpense.php" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Fiyat Yönetimi
              </p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>