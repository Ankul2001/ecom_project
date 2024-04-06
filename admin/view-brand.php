<?php include "header.php"; ?>


<div class="content-wrapper">

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Brands</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Brands</li>
            <li class="breadcrumb-item active">View Brands</li>
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
        <h3>Our Brands</h3>
      </div>
      <div class="card-body table-responsive">
        <table class="table table-striped table-condensed">
          <thead>
            <tr>
              <th>S.No.</th>
              <th>Name </th>
              <th>Category</th>
              <th>Pic</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sn = 1;
            $result = $admin_obj->BrandList();
            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                  <td><?php echo $sn; ?></td>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php
                      $c_result = $admin_obj->ViewCategory();
                      if (mysqli_num_rows($c_result) > 0) {
                        $i = 0;
                        while ($c_row = mysqli_fetch_assoc($c_result)) {
                          $cat = explode(',', $row['category']);
                          if ($c_row['id'] == $cat[$i]) {
                      ?>
                          <?php echo $c_row['name']; ?>
                    <?php
                            if ($i < (count($cat) - 1)) {
                              echo ",";
                            }
                            $i++;
                          }
                        }
                      }
                    ?></td>
                  <td><img src="uploads/<?php echo $row['logo']; ?>" alt="" width="50px"></td>
                  <td>
                    <?php
                    if ($row['status'] == 1) {
                      echo "Active";
                    } else {
                      echo "Active";
                    }
                    ?>
                  </td>
                  <td><a href="add-brand.php?editid=<?php echo $row['id']; ?>" class="btn btn-success">View/Edit</a> <a href="admin-code.php?deletebrandid=<?php echo $row['id']; ?>" class="btn btn-danger">Remove</a></td>
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