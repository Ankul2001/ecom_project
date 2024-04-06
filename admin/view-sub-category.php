<?php include "header.php"; ?>


<div class="content-wrapper">

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Category</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item ">Category</li>
            <li class="breadcrumb-item active">View Subcategory</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>


  <!-- Main content -->
  <section class="content">

    <div class="container ">
      <div class="card">
        <div class="card-header bg-primary text-light text-center">
          <h1>Sub Caterogy List</h1>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">

              <?php
              $result = $admin_obj->ViewCategory();
              if (mysqli_num_rows($result) > 0) {
                while ($c_row = mysqli_fetch_assoc($result)) {
              ?>
                  <div class="card">
                    <div class="card-header bg-secondary text-light">
                      <h3 class="card-title "><?php echo $c_row['name']; ?></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="categorytable" class="table table-striped table-condensed">
                        <thead>
                          <tr>
                            <th>S.No.</th>
                            <th>Sub-Caterogy</th>
                            <th>Caterogy</th>
                            <th>Photo</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $res = $admin_obj->ViewSubCategory();
                          $cat = $c_row['id'];
                          if (mysqli_num_rows($res) > 0) {
                            $n = 1;
                            while ($s_row = mysqli_fetch_assoc($res)) {
                              // $scat = $s_row['category'];
                              $arr_scat = explode(',', $s_row['category']);
                              for ($i = 0; $i < count($arr_scat); $i++) {
                                if ($cat == $arr_scat[$i] && $cat == $arr_scat[$i]) {
                          ?>

                                  <tr>
                                    <td><?php echo $n; ?></td>
                                    <td><?php echo $s_row['name']; ?></td>
                                    <td><?php echo $c_row['name']; ?></td>
                                    <td><img src="uploads/<?php echo $s_row['pic']; ?>" alt="" height="100px"></td>
                                    <td><?php
                                        if ($s_row['status'] == 1) {
                                          echo "Active";
                                        } else {
                                          echo "Deactivate";
                                        }
                                        ?></td>
                                    <td><a href="add-sub-category.php?editsubid=<?php echo $s_row['id']; ?>" class="btn btn-success">View/Edit</a> <a href="admin-code.php?deletesubcatid=<?php echo $s_row['id']; ?>" class="btn btn-danger">Remove</a></td>
                                  </tr>
                          <?php
                                $n++;
                                }
                              }
                            }
                          }
                          ?>

                        </tbody>
                        <tfoot>
                          <tr>
                            <th>S.No.</th>
                            <th>Sub-Caterogy</th>
                            <th>Caterogy</th>
                            <th>Photo</th>
                            <th>Status</th>
                            <th>Action</th>

                          </tr>
                        </tfoot>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
              <?php
                }
              }
              ?>
            </div>
            <div class="col-lg-1"></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>





<?php include "footer.php"; ?>