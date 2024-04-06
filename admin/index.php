<?php include "header.php"; ?>


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <?php
            $cat_res = $admin_obj->ViewCategory();
            if (mysqli_num_rows($cat_res) > 0) {
              $cat = 0;
              while ($cat_row = mysqli_fetch_assoc($cat_res)) {



                $cat++;
              }
            ?>
                <div class="inner">
                  <h3><?php echo $cat;  ?></h3>
                  <p>Total Category</p>
                </div>
            <?php
              
            }
            ?>

            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="view-category.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
          <?php
            $subcat_res = $admin_obj->ViewSubCategory();
            if (mysqli_num_rows($subcat_res) > 0) {
              $subcat = 0;
              while ($subcat_row = mysqli_fetch_assoc($subcat_res)) {



                $subcat++;
              }
            ?>
                <div class="inner">
                  <h3><?php echo $subcat;  ?></h3>
                  <p>Total Sub-Category</p>
                </div>
            <?php
              
            }
            ?>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="view-sub-category.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
          <?php
            $user_res = $admin_obj->ViewRegisteruser();
            if (mysqli_num_rows($user_res) > 0) {
              $user = 0;
              while ($user_row = mysqli_fetch_assoc($user_res)) {



                $user++;
              }
            ?>
                <div class="inner">
                  <h3><?php echo $user;  ?></h3>
                  <p>Total Register User</p>
                </div>
            <?php
              
            }
            ?>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
          <?php
            $pro_res = $admin_obj->ViewProducts();
            if (mysqli_num_rows($pro_res) > 0) {
              $pro = 0;
              while ($pro_row = mysqli_fetch_assoc($pro_res)) {



                $pro++;
              }
            ?>
                <div class="inner">
                  <h3><?php echo $pro;  ?></h3>
                  <p>Total Products</p>
                </div>
            <?php
              
            }
            ?>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="view-products.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
     
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>





<?php include "footer.php"; ?>