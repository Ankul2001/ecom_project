<style>
     .checkbox:checked {
        accent-color: #fe4c54;
        /* background-color: #fe4c54; */
    }
</style>
<?php
include "header.php";
if(isset($_REQUEST['orderid'])){
    $order_id=$_REQUEST['orderid'];

}
$result = $object->DisplayOrder($order_id);
if (mysqli_num_rows($result) > 0) {
    $order = mysqli_fetch_assoc($result);
}

?>
<div class="container" style="margin-top: 200px;">
    <div class="row">
        <div class="col-lg-6  py-4 px-5">
            <div class="address card">
                <h4 class="card-header" style="color:#fe4c54 ;">Address :</h4>
                <div class="mx-3 card-body" style="letter-spacing: 1px;font-size:18px;line-height:30px;"><span><?php echo $order['first_name'] ?></span> <span><?php echo $order['last_name'];
                                                                                                                                                                ?></span>,<br>
                    <span><?php echo $order['address1'] ?></span>,<span><?php echo $order['address2'] ?></span>,<br>
                    <span><?php echo $order['town_city'] ?></span><span>(<?php echo $order['pincode'] ?>),</span><br>
                    <span><?php echo $order['state'] ?></span><span>(<?php echo $order['contry'] ?>)</span>
                </div>
            </div>
        </div>
        <div class="col-lg-6  card">
            <div class="card-header" style="background-color: #fae9ea;text-align: center;">
                <h2 style="color: #fe4c54;">Payment Mode</h2>
            </div>
            <div class="card-body text-center px-5">
                <div class="amount mb-5 mt-3 py-3 px-5" style="font-size: 25px;display: flex;justify-content: space-between;background-color:#fe4c54;color: #fae9ea;">
                    <span>Payable Amount :</span><span><?php echo $order['order_price']; ?></span>
                </div>
                <ul class="px-5 mx-5" style="font-size: 20px;">
                    <li class="my-3 " style="display:flex;justify-content:space-between;"><i class="fa fa-credit-card"> Cards</i><input type="radio" class="checkbox" name="payment" value="card"></li>
                    <li class="my-3 " style="display:flex;justify-content:space-between;"><i class="fa fa-bank"> Bank</i><input type="radio" name="payment" class="checkbox" value="bank"></li>
                    <li class="my-3 " style="display:flex;justify-content:space-between;"><i class="fa fa-paypal"> UPI</i><input type="radio" name="payment" class="checkbox" value="upi"></li>
                    <li class="my-3 " style="display:flex;justify-content:space-between;"><i class="fa fa-truck"> Cash on Delivery</i><input type="radio" class="checkbox" name="payment" value="COD"></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-12 text-center mt-4 pt-4">
            <input type="checkbox" name="confurm" class="checkbox" id="confurm"> <label style="font-size:20px;"> Make Sure For Payment*</label><br>
            <button class="btn mt-5" style="background-color:#fe4c54;color:#fae9ea" id="payment<?php echo $order['order_id']; ?>">Payment</button>
        </div>
    </div>
</div>
<?php include "footer.php" ?>
<script>
    $(function() {
        // var pay = document.getElementsByName("payment").val();
        
        $("#payment<?php echo $order['order_id']; ?>").attr("disabled", "disabled");
        $("#confurm").click(function() {
            var checked_status = this.checked;
            if (checked_status == true) {
                $("#payment<?php echo $order['order_id']; ?>").removeAttr("disabled");
            } else {
                $("#payment<?php echo $order['order_id']; ?>").attr("disabled", "disabled");
            }
        });
       
        $("#payment<?php echo $order['order_id']; ?>").click(function() {
            var pay =$("input[type='radio'][name='payment']:checked").val();

            var order_id ="<?php echo $order['order_id']; ?>";
            var action = "paymetdetails";
            var oamount="<?php echo $order['order_price']; ?>";
            $.ajax({
                type: "POST",
                url: "code.php",
                data: {
                    orderid: order_id,
                    mode: pay,
                    amount:oamount,
                    paydo: action
                },
                success: function(res) {
                    alert("Thank You For Order!!");
                   
                    window.location.href = "user_cart.php";
                }
            })
        })
    })
</script>