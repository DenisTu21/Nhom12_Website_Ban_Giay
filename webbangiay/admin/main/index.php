<?php

require_once "../../DB/dbhelper.php";
?>

<!DOCTYPE html>
<html lang="en">



<head>
  <?php
  require_once "main.php"
  ?>
</head>

<body>
  <!-- header -->
  <?php
  require_once "header.php"
  ?>
  <!-- sidebar -->
  <?php
  require_once "sidebar.php"
  ?>

  <!--main content start-->
  <section id="main-content">
    <section class="wrapper">
      <!--overview start-->
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
            <li><i class="fa fa-laptop"></i>Dashboard</li>
          </ol>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <div class="info-box blue-bg">
            <i class="fa fa-area-chart "></i>

            <div class="count">

              <?php

              $sql         = 'select * from chitietdonhang';
              $orderdetail = executeResult($sql);
              $count = 0;
              foreach ($orderdetail as $item) {
                $count += $item['price'];
              }
              echo number_format($count, 0, ',', '.') . 'đ';

              ?>


            </div>
            <div class="title">Revenue</div>
          </div>
          <!--/.info-box-->
        </div>
        <!--/.col-->

        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <div class="info-box brown-bg">
            <i class="fa fa-shopping-cart"></i>
            <div class="count">

              <?php

              $sql         = 'select * from chitietdonhang';
              $orderdetail = executeResult($sql);
              $count = 0;
              foreach ($orderdetail as $item) {
                $count += $item['num'];
              }
              echo $count . 'pros';

              ?>
            </div>
            <div class="title">Amount Products Sold</div>
          </div>
          <!--/.info-box-->
        </div>
        <!--/.col-->

        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <div class="info-box dark-bg">
            <i class="fa fa-puzzle-piece "></i>
            <div class="count">
              <?php
              $count = 0;
              $sql         = 'select count(id) as total from sanpham where 1 ';
              $countResult = executeSingleResult($sql);

              if ($countResult != null) {
                $count  = $countResult['total'];
              }
              echo $count . 'pros';
              ?>



            </div>
            <div class="title">Amount of Products</div>
          </div>
          <!--/.info-box-->
        </div>
        <!--/.col-->

        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <div class="info-box green-bg">
            <i class="fa fa-cubes"></i>
            <div class="count">
              <?php
              $count = 0;
              $sql         = 'select count(id) as total from danhmucsanpham where 1 ';
              $countResult = executeSingleResult($sql);

              if ($countResult != null) {
                $count  = $countResult['total'];
              }
              echo $count . 'cates';
              ?>


            </div>
            <div class="title">Amount of Categories</div>
          </div>
          <!--/.info-box-->
        </div>
        <!--/.col-->

      </div>
      <!--/.row-->

      <!-- <div class="text-center">
        <div class="credits">
          Designed by <a href="">BootstrapMade</a>
        </div>
      </div> -->
    </section>

  </section>
  <!-- javascripts -->
  <?php
  require_once "js.php"
  ?>
</body>

</html>