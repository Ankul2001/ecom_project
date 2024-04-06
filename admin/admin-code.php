
<?php

include("admin_connection.php"); 

// for admin login

if(isset($_POST['loginbtn'])){
    $adminemail=$_POST['email'];
    $adminpass=$_POST['password'];
    $result=$admin_obj->admin_login($adminemail,$adminpass);
    if($result){
    if(mysqli_num_rows($result)>0){
        $admin=mysqli_fetch_assoc($result);
        $_SESSION['adminid']=$admin['Email'];
        $_SESSION['adminname']=$admin['Name'];
        ?><script>
            alert("Welcome Admin Store");
            window.location.href="index.php";
        </script>
        <?php
    // }
}
    else{
        ?><script>
            alert("invalid entry");
            window.location.href="admin-login.php";
    </script>
    <?php
    }
}
}

// for admin logout

if(isset($_REQUEST['dologout']) && $_REQUEST['dologout']=="logoutbtn"){
    // session_start();
    session_destroy();
    ?>
    <script>
        alert("Admin LogOut");
        window.location.href="admin-login.php";
    </script>
    <?php
}

// for add category

if(isset($_POST['btncat'])){
    $category=$_POST['category'];
    $status=$_POST['status'];
    $pic= $_FILES['pic']['name'];
    $folder= 'uploads/';
    $path= $folder.basename($pic);
    move_uploaded_file($_FILES['pic']['tmp_name'], $path);
    if($admin_obj->addCategory($category, $pic , $status)){
        ?>
            <script>
                alert("Category Added");
                window.location.href="add-category.php";
            </script>

<?php }

}

//  for add sub-category

if(isset($_POST['btnsubcat'])){
    $category=$_POST['category'];
    $catstrying=implode(',',$category);
    $status=$_POST['status'];
    $subcategory=$_POST['subcategory'];
    $pic= $_FILES['pic']['name'];
    $folder= 'uploads/';
    $path= $folder.basename($pic);
    move_uploaded_file($_FILES['pic']['tmp_name'], $path);
    if($admin_obj->addSubCategory( $subcategory,$catstrying, $pic,$status)){
        ?>
            
            <script>
                alert("Sub-Category Added");
                window.location.href="add-sub-category.php";
            </script>

<?php }


}

///  for add products

if(isset($_POST['productaddbtn'])){


    $productcode="ANK".rand(1000,9999);    
    $name=$_POST['name'];
    $brand=$_POST['brand'];
    $title=$_POST['title'];
    $slug=str_replace(" ","-",$title);
    $keyword=$_POST['keyword'];
    $price=$_POST['price'];
    $shortdescription=$_POST['shortdescription'];
    $longdescription=$_POST['longdescription'];
    $size=$_POST['size'];
    $colors=$_POST['colors'];
    $gst=$_POST['gst'];
    $status=$_POST['status'];
    $deliverycharge=$_POST['deliverycharge'];
    $category=$_POST['category'];
    $catstrying=implode(',',$category);
    $subcategory=$_POST['subcategory'];
    $substrying=implode(',',$subcategory);
        // display pic
    $pic= $_FILES['pic']['name'];
    $folder= 'uploads/';
    $path= $folder.basename($pic);
    move_uploaded_file($_FILES['pic']['tmp_name'], $path);
    // other pics
    $pics=$_FILES['pics']['name'];
    for ($i = 0; $i < count($pics); $i++) {
        $url = $folder.basename($pics[$i]);
        move_uploaded_file($_FILES['pics']['tmp_name'][$i], $url);
    }
    $allpics = implode(',', $pics);

    $result=$admin_obj->AddProduct($productcode,$name,$title,$slug,$keyword,$catstrying,$substrying,$brand,$price,$shortdescription,$longdescription,$size,$colors,$gst,$deliverycharge,$pic,$allpics,$status);

    if($result){
        ?>
        <script>
            alert("Add Product");
            window.location.href="add-product.php";
        </script>
        <?php
    }
}

// for category update

if(isset($_POST['btnupdatecat'])){
    $category=$_POST['category'];
    $updateid=$_POST['hiddenid'];
    $status=$_POST['status'];
    $pic= $_FILES['pic']['name'];
    $folder= 'uploads/';
    // $path= $folder.basename($pic);
    // move_uploaded_file($_FILES['pic']['tmp_name'], $path);
    if(!empty(basename($pic))){
        $path= $folder.basename($pic);
        move_uploaded_file($_FILES['pic']['tmp_name'], $path);

    }else{
        $pic= $_POST['picid'];
    }
    if($admin_obj->updateCategory($category, $pic, $updateid,$status)){
        ?>
            <script>
                alert("Category Updated");
                window.location.href="view-category.php";
            </script>

<?php }

}

// for update SubCategory

if(isset($_POST['btnUpdateSub'])){
    $category=$_POST['category'];
    $catstrying=implode(',',$category);
    $updateid=$_POST['updateid'];
    $status=$_POST['status'];
    $subcategory=$_POST['subcategory'];
    $folder= 'uploads/';
    $pic= $_FILES['pic']['name'];
    if(!empty(basename($pic))){
        $path= $folder.basename($pic);
        move_uploaded_file($_FILES['pic']['tmp_name'], $path);

    }else{
        $pic= $_POST['picid'];
    }
    if($admin_obj->updateSubCategory( $subcategory,$catstrying, $pic,$updateid,$status)){
        ?>
            <script>
                alert("Sub-Category Updated");
                window.location.href="view-sub-category.php";
            </script>

<?php }


}

// for update products

if(isset($_POST['btnupdatepro'])){

    $productid=$_POST['productid'];
    $name=$_POST['name'];
    $brand=$_POST['brand'];
    $status=$_POST['status'];
    $title=$_POST['title'];
    $slug=str_replace(" ","-",$title);
    $keyword=$_POST['keyword'];
    $price=$_POST['price'];
    $shortdescription=$_POST['shortdescription'];
    $longdescription=$_POST['longdescription'];
    $size=$_POST['size'];
    $colors=$_POST['colors'];
    $gst=$_POST['gst'];
    $deliverycharge=$_POST['deliverycharge'];
    $category=$_POST['category'];
    $catstrying=implode(',',$category);
    $subcategory=$_POST['subcategory'];
    $substrying=implode(',',$subcategory);
    // display pic
    $pic= $_FILES['pic']['name'];
    $folder= 'uploads/';
    if(!empty(basename($pic))){
        $path= $folder.basename($pic);
        move_uploaded_file($_FILES['pic']['tmp_name'], $path);

    }else{
        $pic= $_POST['picid'];
    }
    // other pics
    $pics=$_FILES['pics']['name'];
    //echo count($pics);

    if(!empty($pics[0])){
        $allpics= implode(',', $pics);
        for($i=0; $i<count($pics); $i++){
            $url= $folder.basename($pics[$i]);
            move_uploaded_file($_FILES['pics']['tmp_name'][$i], $url);

        }
    }else{
        $allpics= $_POST['picsid'];
    }

    // // if(!empty($pics[0])){
    // //     for ($i = 0; $i < count($pics); $i++) {
    // //         $url = $folder.basename($pics[$i]);
    // //         move_uploaded_file($_FILES['pics']['tmp_name'][$i], $url);
    // //     }
    // //     $allpics = implode(',', $pics);

    // // }else{
    // //     echo $allpics= $_POST['picsid'];
    // // }

    $result=$admin_obj->UpdateProduct($name,$title,$keyword, $catstrying,$slug,$substrying,$brand,$price,$shortdescription,$longdescription,$size,$colors,$gst,$deliverycharge,$pic,$allpics,$productid,$status) ;

    if($result){
        ?>
        <script>
            //alert("Add Updated");
            //window.location.href="view-products.php";
        </script>
        <?php
    }
}

// for delete product

if(isset($_REQUEST['deleteproid'])){
    $delid=$_REQUEST['deleteproid'];
    $result=$admin_obj->DeleteProduct($delid);
    if($result){ 
    ?>
    <script>
        alert("Product Deleted");
        window.location.href="view-products.php";
    </script>

<?php }
}

// for delete category

if(isset($_REQUEST['deletecatid'])){
    $delid=$_REQUEST['deletecatid'];
    $result=$admin_obj->DeleteCategory($delid);
    if($result){  
    ?>
    <script>
        alert("Category Deleted");
        window.location.href="view-category.php";
    </script>

<?php }

}
// for delete sun-category

if(isset($_REQUEST['deletesubcatid'])){
    $delid=$_REQUEST['deletesubcatid'];
    $result=$admin_obj->DeleteSubCategory($delid);
    if($result){   
    ?>
    <script>
        alert("Sub-Category Deleted");
        window.location.href="view-sub-category.php";
    </script>

<?php }

}

//for add brand

if(isset($_POST['btnaddbrand'])){
    $name=$_POST['name'];
    $category=$_POST['category'];
    $caystring=implode(',',$category);
    $status=$_POST['status'];
    $pic=$_FILES['pic']['name'];
    $folder= 'uploads/';
    if(!empty(basename($pic))){
        $path= $folder.basename($pic);
        move_uploaded_file($_FILES['pic']['tmp_name'], $path);

    }else{
        $pic= $_POST['picid'];
    }
    $result=$admin_obj->AddBrands($name,$caystring,$pic, $status);
    if($result){   
        ?>
        <script>
            alert("Brand Added");
            window.location.href="add-brand.php";
        </script>
    
    <?php } 

}

// for update brand

if(isset($_POST['btnupdatebrand'])){
    $updateid=$_POST['hiddenid'];
    $name=$_POST['name'];
    $category=$_POST['category'];
    $caystring=implode(',',$category);
    $status=$_POST['status'];
    $pic=$_FILES['pic']['name'];
    $folder= 'uploads/';
    if(!empty(basename($pic))){
        $path= $folder.basename($pic);
        move_uploaded_file($_FILES['pic']['tmp_name'], $path);

    }else{
        $pic= $_POST['picid'];
    }
    $result=$admin_obj->UpdateBrands($name,$caystring,$pic, $status,$updateid);
    if($result){   
        ?> 
        <script>
            alert("Brand Updated");
            window.location.href="view-brand.php";
        </script>
    
    <?php } 

}

// for delete brand

if(isset($_REQUEST['deletebrandid'])){
    $deleteid=$_REQUEST['deletebrandid'];
    $result=$admin_obj->DeleteBrand($deleteid);
    if($result){   
    ?>
    <script>
        alert("Brand Deleted") ;
        window.location.href="view-brand.php";
    </script>

<?php }
}

if(isset($_POST['orderdo']) && $_POST['orderdo']=="UpadateOrderStatus"){
    $oder_id=$_POST['orderid'];
    $orderstatus=$_POST['status'];
        ?> 
        <script>
            alert("<?php echo $orderstatus;?>");
        </script>
        <?php
    
    $result=$admin_obj->UpdateOrederStatus($oder_id,$orderstatus);
    
}

?>