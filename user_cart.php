<style>
    .cart-products {
        /* border: 1px solid; */
    }

    .cart-product-img {
        /* border: 1px solid; */

    }

    .cart-product-img img {
        width: 100%;
        height: 130px;
        aspect-ratio: 1;
        object-fit: contain;

    }

    .quantity {
        margin: auto;
        width: fit-content;
    }

    .quantity button {
        border-radius: 50%;
        border-top: transparent;
        border-left: transparent;
        border-right: transparent;
        width: 25px;
        height: 25px;

    }

    .quantity button:active {
        border-top: 2px solid black;
        border-left: 2px solid black;
        border-bottom: transparent;
    }

    .quantity input {
        width: 50px;
        height: 25px;
        text-align: center;
        text-justify: auto;
        border-radius: 3px;
        border: 1px solid #fe4c50;
        /* border: 1px solid Grey; */
    }

    .cart-product-details {
        /* border: 1px solid; */
    }

    .cart-product-details .title {
        /* border: 1px solid; */
        font-size: 20px;
        margin-top: 30px;
    }

    .cart-product-details .price {
        /* border: 1px solid; */
    }

    .cart-product-details .price span {
        font-weight: 600;
        font-size: 17px;
        color: gray;
        margin-right: 10px;
    }

    .cart-product-details .price del {
        /* font-weight: 600; */
        font-size: 13px;
        color: red;
    }

    .product-action {
        /* border: 1px solid; */
        /* justify-items: center; */
    }

    .product-action a {
        /* display: block; */
        margin-top: 80px;
        font-size: 15px;
        background-color: #fe4c50;
        color: #fff;
    }

    .product-action a:hover {
        color: antiquewhite;
        background-color: #fe4c54;
    }

    .price-details .head {
        /* background-color: rgba(240, 240, 240, 0.814); */
        background-color: #f8e1e3e0;
    }

    .price-details h4 {
        color: gray;
        color: #fe4c54;
    }

    .price-details .prc {
        /* border: 1px solid; */
        font-size: 15px;
        display: flex;
        justify-content: space-between;
        line-height: 25px;
    }

    .price-details .discount {
        /* border: 1px solid; */
        font-size: 15px;
        display: flex;
        justify-content: space-between;
        line-height: 25px;
    }

    .price-details .delivery_charge {
        /* border: 1px solid; */
        font-size: 15px;
        display: flex;
        justify-content: space-between;
        line-height: 25px;
    }

    .price-details .total {
        /* border: 1px dotted; */
        font-size: 18px;
        display: flex;
        justify-content: space-between;
        line-height: 25px;
    }

    .dispar span {
        font-size: 13px;
        font-weight: 700;

    }

    .emptymsg {
        font-size: 70px;
        font-weight: 600;
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        line-height: 250px;
        word-spacing: 10px;
        color: rgb(235, 202, 202);
    }

    .contshop {
        background-color: #fe4c54;
        color: #fff;
        font-size: 20px;
        /* padding: 30px 20px; */
    }

    .contshop:hover {
        color: #fff;
        background-color: #fa7d7f;
    }

    #checkbox:checked {
        accent-color: #fe4c54;
        /* background-color: #fe4c54; */
    }
</style>


<?php include "header.php";

if (!isset($_SESSION['username'])) {
?>
    <script>
        window.location.href = "user_login.php";
    </script>
<?php
}



?>
<div class="container" style="margin:auto;margin-top:180px">
    <div class="row">
        <div class="col-lg-8 row cart-products ">
            <table class="table table-striped  table-condensed">

                <?php
                $user = $_SESSION['user_id'];
                $result = $object->displayCart($user);

                if (mysqli_num_rows($result) > 0) {
                    $count_cart = 0;
                    $totalmrp = 0;
                    $totalprice = 0;

                    while ($pro = mysqli_fetch_assoc($result)) {
                        $count_cart++;
                        $pro_code = $pro['product_code'];
                        $pro_result = $object->displayCartProduct($pro_code);

                        $pro_row = mysqli_fetch_assoc($pro_result);

                ?>

                        <tr class="py-5">
                            <td style="display:flex">
                                <input type="checkbox" id="checkbox">
                                <div class="col-lg-4 cart-product-img">
                                    <img src="admin/uploads/<?php echo $pro_row['pic'] ?>" alt="<?php echo $pro_row['title'] ?>" class="cart_img">
                                    <span id="pro_code<?php echo $pro['id'] ?>" style="display:none;"><?php echo $pro['product_code']; ?></span>
                                    <div class="quantity my-3" style="display:flex;">
                                        <button id="d_quantity<?php echo $pro['id'] ?>" class="down">-</button>
                                        <input type="text" id="quantity_count<?php echo $pro['id'] ?>" class="mx-2" value=<?php echo $pro['quantity']; ?>>
                                        <button id="i_quantity<?php echo $pro['id'] ?>" class="up">+</button>
                                    </div>
                                </div>
                                <div class="col-lg-6 cart-product-details">
                                    <div class="title"><b>
                                            <?php echo $pro_row['title'] ?>
                                        </b></div>
                                    <!-- <div class="price">$160.00</div> -->
                                    <div class="price mt-3"><span>₹</span><span id="price_cont<?php echo $pro['id'] ?>">
                                            <?php

                                            $price = $pro['pro_sell_price'];
                                            $qitem = $pro['quantity'];
                                            $totalcartprice = $price * $qitem;
                                            $totalprice += $totalcartprice;
                                            echo number_format($totalcartprice);

                                            // $mrp = $pro_row['price'];
                                            // $dis = $pro_row['discounts(%)'];
                                            // $qitem = $pro['quantity'];
                                            // $pricedis = $mrp * ($dis / 100);
                                            // $totaldiscount += $pricedis;
                                            // $finalprice = $mrp - $pricedis;
                                            // $quntprice = $qitem * $finalprice;
                                            // echo number_format($quntprice, 2);
                                            ?>

                                        </span><del> ₹ <i id="discount_count<?php echo $pro['id'] ?>">
                                                <?php
                                                $qunt = $pro['quantity'];
                                                $mrp = $pro_row['price'];
                                                $cartmrp = $mrp * $qunt;
                                                $totalmrp += $cartmrp;
                                                echo number_format($cartmrp);
                                                ?>
                                            </i></del></div>
                                    <div class="dispar text-success"><span>
                                            <?php echo $pro_row['discounts(%)'] ?> % Off
                                        </span></div>
                                </div>
                                <div class="col-lg-2 product-action">
                                    <a href="code.php?removeidcart=<?php echo $pro['id'] ?>" class="btn remove"><i class="fa fa-trash"></i></a>
                                </div>

                                <script>
                                    $(function() {
                                        var vel = $("#quantity_count<?php echo $pro['id'] ?>").val();
                                        if (parseInt(vel) <= 1) {
                                            $('#d_quantity<?php echo $pro['id'] ?>').attr('disabled', true)
                                        }

                                        // $('#d_quantity').prop('disabled', true)

                                        $("#i_quantity<?php echo $pro['id'] ?>").click(function() {
                                            var qunt = $("#quantity_count<?php echo $pro['id'] ?>").val();
                                            var increase = parseInt(qunt) + 1;
                                            $("#quantity_count<?php echo $pro['id'] ?>").val(increase);



                                            //price increase

                                            var dprice = parseInt(<?php echo $totalcartprice; ?>);
                                            var qprice = dprice * increase;
                                            $("#price_cont<?php echo $pro['id'] ?>").html(qprice);

                                            var dmrp = parseInt(<?php echo $pro_row['price']; ?>);
                                            var qmrp = increase * dmrp;
                                            $("#discount_count<?php echo $pro['id'] ?>").html(qmrp);

                                            //checkeout price

                                            var checkemrp = parseInt($('#pricemrp').html());
                                            var addcheckmrp = checkemrp + dmrp;
                                            $('#pricemrp').html(addcheckmrp);

                                            //checkeout discount

                                            var checkediscount = parseInt($('#mrpdicount').html());
                                            var addcheckedis = checkediscount + parseInt(<?php
                                                                                            $discountAdd = $totalmrp - $totalprice;
                                                                                            echo $discountAdd; ?>);
                                            $('#mrpdicount').html(addcheckedis);
                                            addcheckedis += 40;
                                            $('#savemony').html(addcheckedis);

                                            //checkeout finalprice

                                            var checkefinalprice = parseInt($('#totalfinaleprice').html());
                                            var addcheckefinal = checkefinalprice + dprice;
                                            $('#totalfinaleprice').html(addcheckefinal);


                                            if (parseInt(qunt) >= 1) {
                                                $('#d_quantity<?php echo $pro['id'] ?>').attr('disabled', false)
                                            }
                                        })
                                        //qunt incrige
                                        $("#i_quantity<?php echo $pro['id'] ?>").click(function() {
                                            var qunt2 = $("#quantity_count<?php echo $pro['id'] ?>").val();
                                            var pro_code = $("#pro_code<?php echo $pro['id'] ?>").html();
                                            var actionupdate = "updatequnt";
                                            $.ajax({
                                                type: "POST",
                                                url: "code.php",
                                                data: {
                                                    quntupdate: qunt2,
                                                    pro_code: pro_code,
                                                    cart_do: actionupdate
                                                },
                                                


                                            })
                                        })

                                        $("#d_quantity<?php echo $pro['id'] ?>").click(function() {
                                            var qunt = $("#quantity_count<?php echo $pro['id'] ?>").val();

                                            // $('#d_quantity').attr('disabled', false)
                                            decrease = parseInt(qunt) - 1;
                                            $("#quantity_count<?php echo $pro['id'] ?>").val(decrease);


                                            //price dec

                                            var dprice = parseFloat(<?php echo $totalcartprice; ?>);
                                            var qprice = dprice * decrease;
                                            $("#price_cont<?php echo $pro['id'] ?>").html(qprice);
                                            var dmrp = parseFloat(<?php echo $pro_row['price']; ?>);
                                            var qmrp = dmrp * decrease;
                                            $("#discount_count<?php echo $pro['id'] ?>").html(qmrp);

                                            //checkeout price

                                            var checkemrp = parseFloat($('#pricemrp').html());
                                            var addcheckmrp = checkemrp - dmrp;
                                            $('#pricemrp').html(addcheckmrp);

                                            //checkeout discount

                                            var checkediscount = parseInt($('#mrpdicount').html());
                                            var addcheckedis = checkediscount - parseInt(<?php $discountSub = $totalmrp - $totalprice;
                                                                                            echo $discountSub; ?>);
                                            $('#mrpdicount').html(addcheckedis);
                                            addcheckedis += 40;
                                            $('#savemony').html(addcheckedis);

                                            //checkeout finalprice

                                            var checkefinalprice = parseFloat($('#totalfinaleprice').html());
                                            var addcheckefinal = checkefinalprice - dprice;
                                            $('#totalfinaleprice').html(addcheckefinal);

                                            if (parseInt(qunt) <= 2) {
                                                $('#d_quantity<?php echo $pro['id'] ?>').attr('disabled', true)
                                            }
                                        })
                                        //qunt dicrige
                                        $("#d_quantity<?php echo $pro['id'] ?>").click(function() {
                                            var qunt2 = $("#quantity_count<?php echo $pro['id'] ?>").val();
                                            var pro_code = $("#pro_code<?php echo $pro['id'] ?>").html();
                                            var actionupdate = "updatequnt";
                                            $.ajax({
                                                type: "POST",
                                                url: "code.php",
                                                data: {
                                                    quntupdate: qunt2,
                                                    pro_code: pro_code,
                                                    cart_do: actionupdate
                                                },


                                            })
                                        })

                                    })
                                </script>
                            </td>
                        </tr>
                <?php
                    }
                    $emptymsg = "none";
                } else {
                    $emptymsg = "block";
                }
                ?>



            </table>
        </div>

        <div class="col-lg-4">
            <?php
            if (isset($count_cart) && $count_cart > 0) { ?>
                <div class="card  price-details">
                    <div class="card-head px-3 py-1 head">
                        <h4> PRICE DETAILS </h4>
                    </div>
                    <div class="card-body">
                        <div class="prc">
                            <span>Price<span style="font-size: 12px;color: #fe4c50;">(
                                    <?php echo  $count_cart; ?> items)
                                </span></span>
                            <span>₹<b id="pricemrp">
                                    <?php echo $totalmrp; ?>
                                </b></span>
                            <!-- <span>₹180.00</span> -->
                        </div>
                        <div class="discount">
                            <span>Discount</span>
                            <span class="text-success">-₹ <b id="mrpdicount">
                                    <?php
                                    $totaldiscount = $totalmrp - $totalprice;
                                    echo $totaldiscount; ?>
                                </b></span>
                        </div>
                        <div class="delivery_charge">
                            <span>Delivery Charges</span>
                            <span style="color:rgb(20, 175, 20);">free<del class="ml-2" style="font-size: 12px;color: #fe4c50;">₹40.00</del></span>
                            <!-- <span>free</span> -->
                        </div>
                    </div>
                    <div class="card-footer" style="border-block:1px dotted #fe4c4f8f ;background-color: transparent;">
                        <div class="total">
                            <span>Total Amount</span>
                            <span>₹ <b id="totalfinaleprice">
                                    <?php
                                    echo $totalprice;
                                    ?>
                                </b>
                            </span>
                        </div>

                    </div>
                    <span class="mx-4 my-2 text-success">You will save
                        <i id="savemony">
                            <?php
                            $kulbachat = $totaldiscount + 40;
                            //  echo $kulbachat;
                            echo number_format($kulbachat);
                            ?>
                        </i> on this order</span>
                </div>
                <a href="checkout.php" class="btn px-4 py-2 btn-success ml-4 mt-5" style="font-weight: 600; font-size: large;">PROCEED TO CHECKOUT</a>
            <?php } ?>
        </div>
    </div>
    <div class="row" style="display:<?php echo $emptymsg; ?>">
        <div class="col-lg-12 mt-5" style="border: black;">
            <h1 class="text-center emptymsg">NO PRODUCT IN YOUR CART !</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 my-4 py-2 text-center">
            <a href="products.php" class="btn contshop">CONTINUE TO SHOP</a>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>