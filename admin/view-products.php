<?php include "header.php"; ?>


<div class="content-wrapper">

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Products</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item ">Products</li>
            <li class="breadcrumb-item active">View Products</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>


  <!-- Main content -->
  <section class="content row">
    <!-- <div class="col-lg-1"></div> -->
    <div class="col-lg-12 card">
      <div class="card-header bg-primary text-light text-center">
        <h3>Our Products</h3>
      </div>
      <div class="card-body table-responsive">
        <table class="table table-striped table-condensed">
          <thead>
            <th>S.No.</th>
            <th>Code </th>
            <th>Name </th>
            <th>Price</th>
            <th>Category</th>
            <th>Brand</th>
            <th>Size</th>
            <th>Pic</th>
            <th>Status</th>
            <th>Action</th>
          </thead>
          <tbody class="">
            <?php
            $sn = 1;
            $result = $admin_obj->ViewProducts();
            if (mysqli_num_rows($result) > 0) {
              while ($prow = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                  <td><?php echo $sn; ?></td>
                  <td><?php echo $prow['code']; ?> </td>
                  <td><?php echo $prow['name']; ?></td>
                  <td><?php echo $prow['price']; ?></td>
                  <td>
                    <?php
                    $cresult = $admin_obj->ViewCategory();
                    if (mysqli_num_rows($cresult) > 0) {
                      while ($crow = mysqli_fetch_assoc($cresult)) {
                        $i = 0;
                        $cat = explode(',', $prow['category']);
                        while(count($cat)>$i){
                        if ($crow['id'] == $cat[$i]) {
                    ?>
                          <?php echo $crow['name']; ?>
                    <?php
                          if ($i < (count($cat) - 1)) {
                            echo ",";
                          }
                        }
                        $i++;
                      }
                      }
                    } ?></td>
                    <?php
                    $bresult = $admin_obj->BrandList();
                    if (mysqli_num_rows($bresult) > 0) {
                      while ($brow = mysqli_fetch_assoc($bresult)) {
                        if ($prow['brand'] == $brow['id']) {
                    ?>
                  <td><?php echo $brow['name']; ?></th>
              <?php

                        }
                      }
                    } ?>
                  <td><?php echo $prow['size']; ?></td>
                  <td><img src="uploads/<?php echo $prow['pic'];  ?>" width="50px" alt=""></td>
                  <td><?php if ($prow['status'] == 1) {
                        echo "Active";
                      } else {
                        echo "Deactive";
                      }
                      ?></td>
                  <td><a href="add-product.php?editproid=<?php echo $prow['code']; ?>" class="btn btn-success">View/Edit</a> <a href="admin-code.php?deleteproid=<?php echo $prow['code']; ?>" class="btn btn-danger">Remove</a></td>
                </tr>
            <?php
                $sn++;
              }
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    <!-- <div class="col-lg-1"></div> -->

  </section>
  <!-- /.content -->
</div>





<?php include "footer.php"; ?>