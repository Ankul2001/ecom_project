<!-- <style>
    .boxs{
        margin-top: 200px;
    }
</style> -->

<?php include "header.php"; ?>

<?php
// $user_name=;
if ($_SESSION['username']) {

    $userid = $_SESSION['user_id'];
    $result = $object->DisplayOrderAddress($userid);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    }
} else {
?>
    <script>
        window.location.href = "user_cart.php";
    </script>
<?php
}


?>

<div class="container mt-5">
    <form class="card-body" action="code.php" method="post">
        <div class="row " style="margin-top: 100px;">
            <div class="col-lg-7 ">
                <div class="card-header my-3 text-center">
                    <h3 style="color: #fe4c50; text-transform:uppercase;">Delivery Details And Address</h3>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="firstname" class="font-weight-bold h5 mb-3">First Name<sup style="font-size:small;color:#fe4c50">*</sup></label>
                            <input type="text" name="fname" class="form-control" id="firstname" value="<?php echo (isset($row) ? $row['first_name'] : ""); ?>" placeholder="Enter your first name" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="lastname" class="font-weight-bold h5 mb-3">Last Name<sup style="font-size:small;color:#fe4c50">*</sup></label>
                            <input type="text" name="lname" class="form-control" id="lastname" value="<?php echo (isset($row) ? $row['last_name'] : ""); ?>" placeholder="Enter your last name" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="country" class="font-weight-bold h5 my-3">Country<sup style="font-size:small;color:#fe4c50">*</sup></label>
                    <input type="text" name="country" class="form-control" id="country" value="<?php echo (isset($row) ? $row['contry'] : ""); ?>" placeholder="Enter your country " required>
                </div>
                <div class="form-group">
                    <label for="address" class="font-weight-bold h5 my-3">Address <sup style="font-size:small;color:#fe4c50">*</sup></label>
                    <input type="text" name="address1" class="form-control" id="address1" value="<?php echo (isset($row) ? $row['address1'] : ""); ?>" placeholder="Address line 1" required>
                    <input type="text" name="address2" class="form-control mt-3" id="address2" value="<?php echo (isset($row) ? $row['address2'] : ""); ?>" placeholder="Address line 2(Optional)">
                </div>
                <div class="form-group">
                    <label for="city" class="font-weight-bold   h5 my-3">Town/City<sup style="font-size:small;color:#fe4c50">*</sup></label>
                    <input type="text" name="city" class="form-control" id="city" value="<?php echo (isset($row) ? $row['town_city'] : ""); ?>" placeholder="Enter your Town/City" required>
                </div>
                <div class="form-group">
                    <label for="state" class="font-weight-bold h5 my-3">State <sup style="font-size:small;color:#fe4c50">*</sup></label>
                    <input type="text" name="state" class="form-control" id="state" value="<?php echo (isset($row) ? $row['state'] : ""); ?>" placeholder="Enter your state" required>
                </div>
                <div class="form-group">
                    <label for="pincode" class="font-weight-bold h5 my-3">Pin Code <sup style="font-size:small;color:#fe4c50">*</sup></label>
                    <input type="text" name="pincode" class="form-control" id="pincode" value="<?php echo (isset($row) ? $row['pincode'] : ""); ?>" placeholder="Enter your pincode" required>
                </div>
            </div>
            <div class="col-lg-5 container px-5 ">
                <div class="order_data bg-light">
                    <h4 class="p-3 text-center" style="border-bottom:1px #fe4c50 dotted;">YOUR ORDER DETAILS</h4>
                    <table border class="mt-4 mx-4" style="border: #fe4c50;">
                        <thead>
                            <tr>
                                <th class="py-1 px-3" style="width: 150px;color: #fe4c50;">Name</th>
                                <th class="py-1 px-3" style="width: 130px;color: #fe4c50;">Qty</th>
                                <th class="py-1 px-3" style="width: 150px;color: #fe4c50;">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $user = $_SESSION['user_id'];
                            $result = $object->displayCart($user);
                            $i = 0;
                            $sellprice = 0;
                            if (mysqli_num_rows($result) > 0) {
                                while ($pro = mysqli_fetch_assoc($result)) {
                                    $pro_code = $pro['product_code'];
                                    $pro_result = $object->displayCartProduct($pro_code);
                                    $pro_row = mysqli_fetch_assoc($pro_result);
                                    $products[$i] = $pro_code;
                                    $i++;
                            ?>
                                    <tr>
                                        <td class="py-1 px-3">
                                            <?php echo $pro_row['title']; ?>
                                        </td>
                                        <td class="py-1 px-3">

                                            <?php
                                            $cartproqunt = $pro['quantity'];
                                            echo  $cartproqunt; ?>
                                        </td>
                                        <td class="py-1 px-3">
                                            <?php
                                            $cart_prie = $pro['pro_sell_price'];
                                            $totalprice = $cart_prie * $cartproqunt;
                                            $sellprice += $totalprice;
                                            echo number_format($totalprice);
                                            ?>
                                        </td>
                                    </tr>
                            <?php
                                }
                            }
                            $listpro = implode(',', $products);
                            ?>
                            <input type="hidden" name="prolist" value="<?php echo $listpro; ?>">
                        </tbody>
                    </table>
                    <div class="paymant py-4 px-5" style="margin-top: 30px;border-block: 1px dotted red; font-weight: 600;line-height: 30px;">
                        <div class="price" style="display: flex; justify-content: space-between;">
                            <span>Subtotal :</span><span style="color: #fe4c50;">₹ <?php echo number_format($sellprice); ?></span>
                        </div>
                        <div class="tex" style="display: flex; justify-content: space-between;"><span>GST :</span><span style="color: #fe4c50;">+ ₹
                                <?php
                                $tex = $sellprice * (5 / 100);
                                echo number_format($tex);
                                ?>
                            </span></div>
                        <div class="totalprice mt-2" style="display: flex; justify-content: space-between;border-block:1px solid black"><span>Total
                                Payable :</span><span style="color: #fe4c50;"> ₹
                                <?php
                                $finalprice = $sellprice + $tex;
                                echo number_format($finalprice);
                                ?></span></div>
                        <input type="hidden" name="oredrprice" value="<?php echo $finalprice; ?>">
                    </div>
                    <!-- <a href="code.php?do=placeorder" class="btn " >PLACE ORDER</a> -->
                    <button type="submit" name="checkout" id="checkout" class="btn px-4 py-2 ml-5 my-4" style="background-color: #fe4c50; color: #eae3e3; font-weight: 500;">
                        PLACE ORDER
                    </button>


                </div>
            </div>
        </div>
    </form>
</div>
<?php include "footer.php"; ?>