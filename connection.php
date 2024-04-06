<?php 

    class link{

        function __construct(){
            $this->connect=mysqli_connect("localhost","root","","ecom_project");
            session_start();
        }

        function create_user_account($user_name,$email,$phone,$password,$gender,$dob){
            $sql="INSERT INTO `users_data`(`Name`, `Email`, `Phone`, `Password`, `Gender`, `DOB`) VALUES ('$user_name','$email','$phone','$password','$gender','$dob')";
            return mysqli_query($this->connect,$sql);
        }

        function user_login($userid,$password){
            $sql="SELECT * FROM `users_data` WHERE Email='$userid' OR Phone='$userid' AND password='$password'";
            return mysqli_query($this->connect,$sql);
        }


        function displayProducts(){
            $sql= "SELECT * FROM product WHERE status=1";
            return mysqli_query($this->connect, $sql);
        }

        function displayProductById($id){
            $sql= "SELECT * FROM product WHERE code= '$id' and status=1";
            return mysqli_query($this->connect, $sql);
        }

        function AddToCart($pro_id,$user_id,$pro_price){
            // $date= date('d-m-');
            $sql="INSERT INTO `user_cart`(`user_id`, `product_code`,`pro_sell_price`) VALUES ('$user_id','$pro_id','$pro_price')";
            return mysqli_query($this->connect, $sql);
        }
        function cartlistcount($userid){
            $sql="SELECT COUNT(id) as total FROM user_cart WHERE user_id='$userid'";
            return mysqli_query($this->connect, $sql);
        }
        function displayCart($user){
            $sql= "SELECT * FROM user_cart WHERE user_id= '$user' ";
            return mysqli_query($this->connect, $sql);
        }
        function displayCartProduct($pro_code){
            $sql= "SELECT * FROM product WHERE code = '$pro_code' ";
            return mysqli_query($this->connect, $sql);
        }

        function removeproductscart($pro_id){
            $sql="DELETE FROM `user_cart` WHERE id='$pro_id'";
            return mysqli_query($this->connect, $sql);
        }
        function UpdateQuntToCart($pro_id,$user_id,$pro_qunt){
            // $pro_id= mysqli_real_escape_string($this->connect, stripcslashes(trim($pro_id)));
            echo $sql="UPDATE `user_cart` SET `quantity`='$pro_qunt' WHERE `user_id`='$user_id' AND `product_code`='$pro_id'";
            return mysqli_query($this->connect, $sql);
        }
        function UserAddressCheckout($user_id,$fname,$lname,$country,$add1,$add2,$city,$state,$pin,$list ,$status, $orderid,$orderprice){
            $sql="INSERT INTO `delivery_address_detail`(`user_id`, `first_name`, `last_name`, `contry`, `town_city`, `address1`, `address2`, `state`, `pincode`, `Order_Status`, `current_order`, `order_id`, `order_price`) VALUES ('$user_id','$fname','$lname','$country','$city','$add1','$add2','$state','$pin','$status','$list','$orderid','$orderprice')";
            return mysqli_query($this->connect, $sql);
        }
        function DisplayOrderAddress($userid){
            $sql="SELECT * FROM `delivery_address_detail` WHERE user_id='$userid'";
            return mysqli_query($this->connect, $sql);

        }
       
        function DisplayOrder($order_id){
            $sql="SELECT * FROM `delivery_address_detail` WHERE order_id='$order_id' ";
            return mysqli_query($this->connect, $sql);

        }
       
        function DeleteCartAfterCheckout($user_id){
            $sql="DELETE FROM `user_cart` WHERE user_id='$user_id'";
            return mysqli_query($this->connect, $sql);

        }
        function UserDitaile($user_id){
            $sql="SELECT * FROM `users_data` WHERE user_id='$user_id'";
            return mysqli_query($this->connect, $sql);
 
        }

        function PaymentDetails($orderid,$user_id,$mode,$status,$amount){
            $sql="INSERT INTO `payment`(`order_id`, `user_id`, `payment_status`,`payment_type`, `payment_amount`) VALUES ('$orderid','$user_id','$status','$mode','$amount')";
            return mysqli_query($this->connect, $sql);
        }
        function CheckEmailAndPhone($phoneoremail){
            $sql="SELECT * FROM `users_data` WHERE `Email`='$phoneoremail' OR `Phone`='$phoneoremail'";
            $res= mysqli_query($this->connect, $sql);
            if(mysqli_num_rows($res)>0){
                return $msg= "1";
            }else{
                return $msg= "0";
            }

        }
    }


    $object= new link();
