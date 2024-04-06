<?php include "header.php"; ?>
<?php
if (isset($_REQUEST['editproid'])) {
  $editid = $_REQUEST['editproid'];
  $result = $admin_obj->editProduct($editid);
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
  }
  $btnname = "btnupdatepro";
  $active = "";
  $deactive = "";
  if ($row['status'] == 1) {
    $active = "checked";
  } else {
    $deactive = "checked";
  }
} else {
  $btnname = "productaddbtn";
}
?>

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
            <li class="breadcrumb-item active"><?php echo (isset($row)) ? "View/Update Product" : "Add Product" ?></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>


  <!-- Main content -->
  <section class="content">

    <div class="container row">
      <div class="col-lg-2"></div>
      <div class="col-lg-8">

        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title"><?php echo (isset($row)) ? "View/Update Product" : "Add Product" ?></h3>
          </div>
          <form method="post" action="admin-code.php" enctype="multipart/form-data">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">



                  <!-- new -->


                  <div class="form-group">
                    <label for="Category">Categorys :</label>
                    <select class="form-control form-select custom-select chosen-select" data-placeholder="--Select Category--" name="category[]" multiple>
                      <?php
                      $catres = $admin_obj->listCategory();
                      if (mysqli_num_rows($catres) > 0) {
                        $i = 0;
                        while ($crow = mysqli_fetch_assoc($catres)) {
                          $cat = explode(',', $row['category']);
                  
                          if ($i<count($cat) && $cat[$i] == $crow['id']) {
                                $selected = "selected";
                      ?>
                            <option value="<?php echo $crow['id']; ?>" <?php echo $selected; ?>>
                              <?php echo $crow['name']; ?>
                            </option>
                          <?php
                            $i++;
                          } else {
                            $selected = "";
                          ?>
                            <option value="<?php echo $crow['id']; ?>" <?php echo $selected; ?>>
                              <?php echo $crow['name']; ?>
                            </option>
                      <?php
                          }
                        }
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="InputEmail1">Subcategory :</label>

                    <select class="form-control form-select custom-select chosen-select" data-placeholder="--Select Sub-Category--" name="subcategory[]" multiple>
                      <?php
                      $subres = $admin_obj->ViewSubCategory();
                      if (mysqli_num_rows($subres) > 0) {
                        $i = 0;
                        while ($srow = mysqli_fetch_assoc($subres)) {
                          $sub = explode(',', $row['subcategory']);
                          if( $i< count($sub) && $sub[$i] == $srow['id']) {
                            $selected = "selected";
                      ?>
                            <option value="<?php echo $srow['id']; ?>" <?php echo $selected; ?>>
                              <?php echo $srow['name']; ?>
                            </option>
                          <?php
                            $i++;
                          } else {
                            $selected = "";
                          ?>
                            <option value="<?php echo $srow['id']; ?>" <?php echo $selected; ?>>
                              <?php echo $srow['name']; ?>
                            </option>
                      <?php
                          }
                        }
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="InputEmail1">Brand :</label>
                   
                    <select class="form-control form-select custom-select chosen-select" data-placeholder="--Select Brand--" name="brand">
                      <?php
                      $brndres = $admin_obj->BrandList();
                      if (mysqli_num_rows($brndres) > 0) {
                        while ($brow = mysqli_fetch_assoc($brndres)) {
                          if ($row['brand'] == $brow['id']) {
                            $selected = "selected";
                      ?>
                            <option value="<?php echo $brow['id']; ?>" <?php echo $selected; ?>>
                              <?php echo $brow['name']; ?>
                            </option>
                          <?php
                          } else {
                            $selected = "";
                          ?>
                            <option value="<?php echo $brow['id']; ?>" <?php echo $selected; ?>>
                              <?php echo $brow['name']; ?>
                            </option>
                      <?php
                          }
                        }
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="InputName">Name :</label>
                    <input type="text" class="form-control" value="<?php echo (isset($row)) ? $row['name'] : ""; ?>" name="name" placeholder="Type Product Name" required>
                  </div>
                  <div class="form-group">
                    <label for="InputTitle">Title :</label>
                    <input type="text" class="form-control" name="title" value="<?php echo (isset($row)) ? $row['title'] : ""; ?>" placeholder="Type Title" required>
                  </div>
                  <!-- <div class="form-group">
                  <label for="InputSlug">Slug :</label>
                  <input type="text" class="form-control" name="slug" placeholder="Type Slug" required>
                </div> -->
                  <div class="form-group">
                    <label for="InputKeyword">Key-words :</label>
                    <input type="text" class="form-control" name="keyword" value="<?php echo (isset($row)) ? $row['keywords'] : ""; ?>" placeholder="Type Keywords" required>
                  </div>
                  <div class="form-group">
                    <label for="InputPrice">Price :</label>
                    <input type="text" class="form-control" name="price" value="<?php echo (isset($row)) ? $row['price'] : ""; ?>" placeholder="Enter Price" required>
                  </div>
                  <div class="form-group">
                    <label for="InputGST">GST :</label>
                    <input type="text" class="form-control" name="gst" value="<?php echo (isset($row)) ? $row['gst'] : ""; ?>" placeholder="Enter GST" required>
                  </div>
                </div>

                <div class="col-lg-6">


                  <div class="form-group">
                    <label for="InputS_description">Short_description :</label>
                    <input type="text" class="form-control" name="shortdescription" value="<?php echo (isset($row)) ? $row['short_description'] : ""; ?>" placeholder="Type Short_description" required>
                  </div>
                  <div class="form-group">
                    <label for="InputL_description">Long_description :</label>
                    <input type="text" class="form-control" name="longdescription" value="<?php echo (isset($row)) ? $row['long_description'] : ""; ?>" placeholder="Type Long_description" required>
                  </div>
                  <div class="form-group">
                    <label for="InputSize">Size :</label>
                    <input type="text" class="form-control" name="size" value="<?php echo (isset($row)) ? $row['size'] : ""; ?>" placeholder="Enter Size" required>
                  </div>
                  <div class="form-group">
                    <label for="InputColors">Colors :</label>
                    <input type="text" class="form-control" name="colors" value="<?php echo (isset($row)) ? $row['colors'] : ""; ?>" placeholder="Type Colors" required>
                  </div>

                  <div class="form-group">
                    <label for="InputDelivery_charge">Discounts(%)  :</label>
                    <input type="text" class="form-control" name="deliverycharge" value="<?php echo (isset($row)) ? $row['discounts(%)'] : ""; ?>" placeholder="Type Discounts" required>
                  </div>


                  <div class="form-group">
                    <label for="InputFile">Display Pic :</label>
                    <div class="input-group">
                      <div class="custom-file row">
                        <div class="<?php echo (isset($row)) ? "col-lg-9" : "col-lg-12"; ?>">
                          <input type="file" class="custom-file-input" id="InputFile" name="pic">
                          <label class="custom-file-label" for="InputFile"><?php echo (isset($row)) ? $row['pic'] : "Choose file"; ?></label>
                        </div>
                        <?php if (isset($row)) {
                        ?>
                          <div class="col-lg-3 pl-2">
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
                    <label for="InputFiles">Other Pics :</label>
                    <div class="input-group">
                      <!-- <div class="custom-file">
                        <input type="file" class="custom-file-input multipics" id="InputFile" name="pics[]" multiple required>
                        <label class="custom-file-label" for="InputFile">Choose file</label>
                      </div> -->

                      <div class="custom-file row">
                        <?php if (!isset($row))
                        {
                        ?>
                          <div class="col-lg-12">
                            <input type="file" class="custom-file-input multipics" id="InputFile" name="pics[]" multiple required>
                            <label class="custom-file-label" for="InputFile">Choose file</label>
                          </div>
                        <?php }else{
                        ?>
                          <div class="col-lg-12">
                            <input type="file" class="custom-file-input" id="InputFile" name="pics[]" multiple>
                            <input type="hidden" value="<?php echo $row['slider_pic']; ?>" name="picsid">
                            <label class="custom-file-label" for="InputFile"><?php echo $row['slider_pic']; ?></label>
                          </div>

                        <?php
                        }
                        ?>
                      </div>
                    </div>


                    <!-- /.card-body -->
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
                </div>
              </div>

              <div class="card-footer">
                <div class="col-lg-12">
                  <input type="hidden" name="productid" value="<?php echo $editid; ?>">
                  <button type="submit" class="btn btn-primary" name="<?php echo $btnname; ?>"><?php echo (isset($row)) ? "Update" : "Submit"; ?></button>
                </div>
              </div>
          </form>
        </div>
      </div>
      <div class="col-lg-2"></div>

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


  //multiple
  $(".multipics").on("change", function() {
    var files = Array.from(this.files)
    var fileName = files.map(f => {
      return f.name
    }).join(", ")
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });

  // $(".custom-file-input").on("change", function() {
  //   var fileName = $(this).val().split("\\").pop();
  //   $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  // });

  //category chose
  $(".chosen-select").chosen({
    no_results_text: "Oops, nothing found!"
  })
</script>