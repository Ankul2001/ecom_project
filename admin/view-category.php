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
            <li class="breadcrumb-item active">Category</li>
            <li class="breadcrumb-item active">View-Category</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>


  <!-- Main content -->
  <section class="content">
    <div class="card">
      <div class="card-header bg-primary text-light text-center">
        <h2>Category List</h2>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <div class="row">
          <div class="col-lg-1"></div>
          <div class="col-lg-10">
            <div class="card">
              <div class="card-body">
                <table id="categorytable" class="table  table-striped table-condensed">
                  <thead>
                    <tr>
                      <th>S.No.</th>
                      <th>Caterogy</th>
                      <th>Photo</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $result = $admin_obj->ViewCategory();
                    if (mysqli_num_rows($result) > 0) {
                      $n = 1;
                      while ($row = mysqli_fetch_assoc($result)) {
                    ?>

                        <tr>
                          <td><?php echo $n; ?></td>
                          <td><?php echo $row['name']; ?></td>
                          <td><img src="uploads/<?php echo $row['pic']; ?>" alt="" height="100px"></td>
                          <td><?php
                              if ($row['status'] == 1) {
                                echo "Active";
                              } else {
                                echo "Deactivate";
                              }
                              ?></td>
                          <td><a href="add-category.php?editid=<?php echo $row['id']; ?>" class="btn btn-success">View/Edit</a> <a href="admin-code.php?deletecatid=<?php echo $row['id']; ?>"  class="btn btn-danger">Remove</a></td>
                        </tr>
                    <?php
                        $n++;
                      }
                    }
                    ?>

                  </tbody>
                  <tfoot>
                    <tr>
                      <th>S.No.</th>
                      <th>Caterogy</th>
                      <th>Photo</th>
                      <th>Status</th>
                      <th>Action</th>

                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>

          <div class="col-lg-1"></div>
        </div>
        <!-- /.card-body -->
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>

<script>
  $(function() {
    // $("#categorytable").DataTable({
    //   "responsive": true, "lengthChange": false, "autoWidth": false,
    //   "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    // }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#categorytable').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>





<?php include "footer.php"; ?>