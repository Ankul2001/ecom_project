<?php 


    class admin_link{

        function __construct(){
            $this->connect=mysqli_connect("localhost","root","","ecom_project");
            session_start();
        }
        function admin_login($email,$pass){
            $sql="SELECT * FROM admin_login WHERE Email='$email' AND Password='$pass'";
            return mysqli_query($this->connect,$sql);
        }
       

        function listCategory(){
            $sql= "SELECT * FROM category WHERE status=1";
            return mysqli_query($this->connect, $sql);
        }

        function addCategory($category, $pic, $status){
            $sql= "INSERT INTO category(name, pic, status) VALUES ('$category', '$pic',' $status')";
            return mysqli_query($this->connect, $sql);
        }
        function addSubCategory( $subcategory,$category, $pic, $status){
            $sql="INSERT INTO `subcategory`(`category`, `name`, `pic`,status) VALUES ('$category','$subcategory','$pic','$status')";
            return mysqli_query($this->connect,$sql);
        }

        function ViewCategory(){
            $sql= "SELECT * FROM category";
            return mysqli_query($this->connect, $sql);
        }
        function ViewSubCategory(){
            $sql= "SELECT * FROM subcategory";
            return mysqli_query($this->connect, $sql);
        }
        function ViewRegisteruser(){
            $sql= "SELECT * FROM users_data";
            return mysqli_query($this->connect, $sql);
        }
        function AddProduct($productcode,$name,$title,$slug,$keyword,$category,$subcategory,$brand,$price,$shortdescription,$longdescription,$size,$colors,$gst,$deliverycharge,$pic,$allpics,$status){
            $sql="INSERT INTO `product`(`code`, `name`, `title`, `slug`, `keywords`, `category`, `subcategory`, `brand`, `price`, `short_description`, `long_description`, `size`, `colors`, `gst`, `discounts(%) `, `pic`, `slider_pic`,status) VALUES ('$productcode','$name','$title','$slug','$keyword','$category','$subcategory','$brand','$price','$shortdescription','$longdescription','$size','$colors','$gst','$deliverycharge','$pic','$allpics','$status')";
            return mysqli_query($this->connect,$sql);
        }
        function ViewProducts(){
            $sql= "SELECT * FROM product";
            return mysqli_query($this->connect, $sql);
        }

        function BrandList(){
            $sql="SELECT * FROM `brands`";
            return mysqli_query($this->connect, $sql);
        }
        function AddBrands($name,$category,$pic,$status){
            $sql="INSERT INTO `brands`( `name`, `category`, `status`, `logo`) VALUES ('$name','$category','$status','$pic')";
            return mysqli_query($this->connect, $sql);
        }
        function editBrands($editid){
            $sql="SELECT * FROM `brands` WHERE id='$editid'";
            return mysqli_query($this->connect, $sql);
        }
        function editCategory($editid){
            $sql= "SELECT * FROM category WHERE id='$editid'";
            return mysqli_query($this->connect, $sql);

        }
        function updateCategory($category, $pic,$updateid,$status){
            $sql= "UPDATE `category` SET `name`='$category',`pic`='$pic',status='$status' WHERE id='$updateid'";
            return mysqli_query($this->connect, $sql);
        }

        function DeleteCategory($delid){
            $sql= "DELETE FROM `category` WHERE id='$delid'";
            return mysqli_query($this->connect, $sql); 
        }
        
        function editSubCategory($editid){
            $sql= "SELECT * FROM subcategory WHERE id='$editid'";
            return mysqli_query($this->connect, $sql);
        }
        function updateSubCategory( $subcategory,$category, $pic,$updateid,$status){
            $sql= "UPDATE `subcategory` SET `name`='$subcategory',`category`='$category',`pic`='$pic',status='$status' WHERE id='$updateid'";
            return mysqli_query($this->connect, $sql);
        }
        function DeleteSubCategory($delid){
            $sql= "DELETE FROM `subcategory` WHERE id='$delid'";
            return mysqli_query($this->connect, $sql); 
        }
        function editProduct($editid){
            $sql= "SELECT * FROM product WHERE code='$editid'";
            return mysqli_query($this->connect, $sql); 
        }
        function UpdateProduct($name,$title,$keyword,$category,$slug,$subcategory,$brand,$price,$shortdescription,$longdescription,$size,$colors,$gst,$deliverycharge,$pic,$allpics,$productid,$status){
            echo $sql= "UPDATE `product` SET`name`='$name',`title`='$title',`slug`='$slug',`keywords`='$keyword',`category`='$category',`subcategory`='$subcategory',`brand`='$brand',`price`='$price',`short_description`='$shortdescription',`long_description`='$longdescription',`size`='$size',`colors`='$colors',`gst`='$gst',`discounts(%) `='$deliverycharge',`pic`='$pic',`slider_pic`='$allpics',status='$status' WHERE code='$productid'";
            return mysqli_query($this->connect, $sql); 
        }

        function DeleteProduct($delid){
            $sql= "DELETE FROM `product` WHERE code='$delid'";
            return mysqli_query($this->connect, $sql); 
        }

        function UpdateBrands($name,$category,$pic, $status,$updateid){
            $sql="UPDATE `brands` SET `name`='$name',`category`='$category',`status`='$status',`logo`='$pic' WHERE id='$updateid'";
            return mysqli_query($this->connect, $sql); 
        }

        function DeleteBrand($deleteid){
            $sql= "DELETE FROM `brands` WHERE id='$deleteid'";
            return mysqli_query($this->connect, $sql); 
        }
        function ViewUsers(){
            $sql= "SELECT * FROM users_data ";
            return mysqli_query($this->connect, $sql); 
        }
        function OrderPaymentList(){
            $sql="SELECT * FROM `payment`";
            return mysqli_query($this->connect, $sql); 
        }
        function OrderDetailList($oder_id){
            $sql="SELECT * FROM `delivery_address_detail` WHERE `order_id`='$oder_id'";
            return mysqli_query($this->connect, $sql); 
        }
        function OrderUserList($user_id){
            $sql="SELECT * FROM `users_data` WHERE `user_id`='$user_id'";
            return mysqli_query($this->connect, $sql); 
        }
        function UpdateOrederStatus($oder_id,$orderstatus){
            $sql="UPDATE `delivery_address_detail` SET `Order_Status`='$orderstatus'  WHERE `order_id`='$oder_id'";
            return mysqli_query($this->connect, $sql); 
        }

    }



    $admin_obj= new admin_link();