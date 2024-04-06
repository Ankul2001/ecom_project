<?php include "header.php"; ?>
<?php
if (isset($_REQUEST['editid'])) {
  $editid = $_REQUEST['editid'];
  $result = $admin_obj->editCategory($editid);
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
  }
  $btnname = "btnupdatecat";
  $active = "";
  $deactive = "";
  if ($row['status'] == 1) {
    $active = "checked";
  } else {
    $deactive = "checked";
  }
} else {
  $btnname = "btncat";
}
?>


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
            <li class="breadcrumb-item active"><?php echo (isset($row)) ? "View/Update Category" : "Add Categroy"; ?></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>


  <!-- Main content -->
  <section class="content">


    <div class="container">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title"><?php echo (isset($row)) ? "View/Update Category" : "Add Categroy"; ?></h3>
        </div>
        <form method="post" action="admin-code.php" enctype="multipart/form-data">
          <div class="card-body">
            <div class="row">
              <div class="col-lg-2"></div>
              <div class="col-lg-8">
                <div class="form-group">
                  <label for="InputEmail1">Category :</label>
                  <input type="text" class="form-control" name="category" placeholder="Type Category" value="<?php echo (isset($row)) ? $row['name'] : "" ?>" required>
                </div>

                <div class="form-group">
                  <label for="InputFile">Category Pic :</label>
                  <div class="input-group">
                    <div class="custom-file row">
                      <div class="<?php echo (isset($row)) ? "col-lg-9" : "col-lg-12"; ?>">
                        <input type="file" class="custom-file-input" id="InputFile" name="pic">
                        <label class="custom-file-label" for="InputFile"><?php echo (isset($row)) ? $row['pic'] : "Choose file"; ?></label>
                      </div>
                      <?php if (isset($row)) {
                      ?>
                        <div class="col-lg-3 pl-5">
                          <img src="uploads/<?php echo $row['pic']; ?>" width="50px" height="50px" alt="">
                          <input type="hidden" value="<?php echo $row['pic']; ?>" name="picid">
                        </div>
                      <?php
                      }
                      ?>
                    </div>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="checkbox">Status :</label>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" value="1" <?php echo (isset($row)) ? $active : ""; ?>>
                    <label class="form-check-label" for="flexCheckDefault">
                      Active
                    </label>
                    <br>
                    <input class="form-check-input" type="radio" value="0" name="status" <?php echo (isset($row)) ? $deactive : ""; ?>>
                    <label class="form-check-label" for="flexCheckChecked">
                      Deactivate
                    </label>
                  </div>
                </div>

                <!-- /.card-body -->
              </div>
              <div class="col-lg-2"></div>
            </div>
          </div>

          <div class="card-footer">
            <div class="row">
              <div class="col-lg-2"></div>
              <div class="col-lg-8">
                <input type="hidden" value="<?php echo $editid; ?>" name="hiddenid">
                <button type="submit" class="btn btn-primary" name="<?php echo $btnname; ?>"><?php echo (isset($row)) ? "Update" : "Submit" ?></button>
              </div>
              <div class="col-lg-2"></div>
            </div>
          </div>
        </form>
      </div>
    </div>

  </section>
  <!-- /.content -->
</div>





<?php include "footer.php"; ?>

<script>
  // Add the following code if you want the name of the file appear on select
  $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });
  //category chose
  $(".chosen-select").chosen({
    no_results_text: "Oops, nothing found!"
  })
</script>