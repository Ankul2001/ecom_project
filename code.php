<?php 
include "connection.php";

// for new user register

if(isset($_POST['registerbtn'])){
   $user_name=$_POST['name'];
   $email=$_POST['email'];
   $phone=$_POST['phone'];
   $password=$_POST['password'];
   $gender=$_POST['gender'];
   $dob=$_POST['dob'];
   
   if($object->create_user_account($user_name,$email,$phone,$password,$gender,$dob)){
    ?>
    <script>
        alert("Account created");
        location.window.href="index.php";
    </script>
    <?php
   }

}

// for user login


if(isset($_POST['loginbtn'])){
    $userid=$_POST['phone'];
    $password=$_POST['password'];

    $result=$object->user_login($userid,$password);
    if(mysqli_num_rows($result)>0){
        $user=mysqli_fetch_assoc($result);
        $_SESSION['username']=$user['Name'];
        $_SESSION['user_id']=$user['user_id'];
        ?>
        <script>
            window.location.href="index.php";
        </script>
        <?php
    }
    else{
        ?>
        <script>1
            alert("user not found");
            window.location.href="index.php";
        </script>
        <?php
    }
}



// for user logout


if(isset($_REQUEST['logout_do'])){
    // session_start();
    session_destroy();
    ?>
    <script>
        window.location.href="index.php";
    </script>
    <?php
}


//add to cart

if(isset($_POST['do']) && $_POST['do']=="addtocart"){
    $pro_id=$_POST['pro'];
    $pro_price=$_POST['price'];
    if(isset($_SESSION['user_id'])){
        $user_id=$_SESSION['user_id'];
    }
    $object->AddToCart($pro_id,$user_id,$pro_price);
} 

//remove from cart

if(isset($_REQUEST['removeidcart'])){
    $pro_id=$_REQUEST['removeidcart'];
    $object->removeproductscart($pro_id);
    ?>
        <script>
            window.location.href="user_cart.php";
        </script>
        <?php
                                    
}

//update the cart

if(isset($_POST['cart_do']) && $_POST['cart_do']=="updatequnt"){    
    $pro_qunt=$_POST['quntupdate'];
    // print_r($pro_qunt);
    $pro_id=$_POST['pro_code'];
    if(isset($_SESSION['user_id'])){
        $user_id=$_SESSION['user_id'];
    }
   
    if($object->UpdateQuntToCart($pro_id,$user_id,$pro_qunt)){
        
    }
       
}

//checkout detailes

if(isset($_POST['checkout'])){
    if(isset($_SESSION['user_id'])){
        $user_id=$_SESSION['user_id'];
    }
    $orderid= "UI".$user_id."ECOM".rand(1000000,9999999);
    $orderprice=$_POST['oredrprice'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $country=$_POST['country'];
    $add1=$_POST['address1'];
    $add2=$_POST['address2'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $pin=$_POST['pincode']; 
    $list=$_POST['prolist'];
    $status="0";   //payment padding

    $result=$object->UserAddressCheckout($user_id,$fname,$lname,$country,$add1,$add2,$city,$state,$pin,$list, $status, $orderid,$orderprice);
    if($result){
        ?>
        <script>
            window.location.href="pay.php?orderid=<?php echo $orderid; ?>";
        </script>
        <?php
    }

}


// for payment 

if(isset($_POST['paydo']) && $_POST['paydo']=="paymetdetails"){
    if(isset($_SESSION['user_id'])){
        $user_id=$_SESSION['user_id'];
    }
    $orderid=$_POST['orderid'];
    $mode=$_POST['mode'];
    $status=rand(0,1);
    $amount=$_POST['amount'];
    $result=$object->PaymentDetails($orderid,$user_id,$mode,$status,$amount);
    if($result){
    $object->DeleteCartAfterCheckout($user_id);
        // echo $orderid;
        // echo $user_id;
        // echo $mode;
        // echo $status;
        // echo $amount;
    }
}


if(isset($_POST['do']) && $_POST['do']=='checkemailandphone'){

    $email= $_POST['emailnphone'];
    $res= $object->CheckEmailAndPhone($email); 
    echo $res;
}





?>