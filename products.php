<style>
    .product_image a img {
        width: 100% !important;
        aspect-ratio: 1;
        object-fit: contain;
    }
</style>



<?php include("header.php"); ?>

<div class="container" style="margin-top: 150px; margin-bottom: 150px">

    <!-- Header -->


    <!-- <div class="fs_menu_overlay"></div> -->



    <div class="row">
        <div class="col">
            <div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>
                <!-- Product 1 -->

                <!-- <div class="product-item men">
                                <div class="product discount product_filter">
                                    <div class="product_image">
                                        <img src="images/product_1.png" alt="">
                                    </div>
                                    <div class="favorite favorite_left"></div>
                                    <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>-$20</span></div>
                                    <div class="product_info">
                                        <h6 class="product_name"><a href="single.html">Fujifilm X100T 16 MP Digital Camera (Silver)</a></h6>
                                        <div class="product_price">$520.00<span>$590.00</span></div>
                                    </div>
                                </div>
                                <div class="red_button add_to_cart_button"><a href="#">add to cart</a></div>
                            </div> -->

                <!-- Product 2 -->
                <?php

                $res = $object->displayProducts();
                if (mysqli_num_rows($res) > 0) {
                    while ($row = mysqli_fetch_assoc($res)) {
                ?>
                        <div class="product-item women">
                            <div class="product product_filter">
                                <div class="product_image">
                                    <a href="product-details.php?id=<?php echo $row['code']; ?>">
                                        <img src="admin/uploads/<?php echo $row['pic']; ?>" alt="<?php echo $row['title']; ?>">
                                    </a>
                                </div>
                                <div class="favorite"></div>
                                <div class="product_bubble product_bubble_left product_bubble_green d-flex flex-column align-items-center"><span>new</span></div>
                                <a href="product-details.php?id=<?php echo $row['code']; ?>">
                                    <div class="product_info">
                                        <h6 class="product_name"><?php echo $row['name']; ?></h6>
                                        <div class="product_price">₹ <b >
                                        <?php $mrp = $row['price'];
                                            $dis = $row['discounts(%)'];
                                            $pricedis = $mrp * ($dis / 100);
                                            $finalprice = $mrp - $pricedis;
                                            echo number_format($finalprice, 2);
                                             ?></b><span id="price_<?php echo $row['code']; ?>" style="display:none;"><?php echo $finalprice;?> </span><br><del style="font-size:12px;color:rgb(248, 159, 159)">₹ <?php echo number_format($row['price'],2); ?></del>
                                             </div>
                                    </div>
                                </a>
                            </div>
                            <div class="red_button add_to_cart_button">
                                <input type="hidden" id="id_<?php echo $row['code']; ?>" value="<?php echo $row['code']; ?>">
                                <?php if(isset($_SESSION['username'])){
                                ?>
                                <a href="#" id="cart_<?php echo $row['code']; ?>">add to cart</a>
                                <?php 
                                }else{
                                    ?>
                                    <a href="user_login.php" >add to cart</a>
                                    <?php
                                }
                                ?>

                            </div>
                            <script>
                                $(function() {
                                    $("#cart_<?php echo $row['code']; ?>").click(function() {
                                        var product = $("#id_<?php echo $row['code']; ?>").val();
                                        var sellprice= $("#price_<?php echo $row['code']; ?>").html();
                                        var action = "addtocart";
                                        $.ajax({
                                            type: "POST",
                                            url: "code.php",
                                            data: {
                                                pro: product,
                                                price:sellprice,
                                                do: action
                                            },
                                            success: function(res) {
                                                window.location.href="user_cart.php";
                                            }
                                        })

                                    })
                                })
                            </script>
                        </div>
                <?php
                    }
                }

                ?>

                <!-- Product 3 -->

                <div class="product-item women">
                    <div class="product product_filter">
                        <div class="product_image">
                            <img src="images/product_3.png" alt="">
                        </div>
                        <div class="favorite"></div>
                        <div class="product_info">
                            <h6 class="product_name"><a href="single.html">Blue Yeti USB Microphone Blackout Edition</a></h6>
                            <div class="product_price">$120.00</div>
                        </div>
                    </div>
                    <div class="red_button add_to_cart_button"><a href="#">add to cart</a></div>
                </div>

                <!-- Product 4 -->

                <div class="product-item accessories">
                                <div class="product product_filter">
                                    <div class="product_image">
                                        <img src="images/product_4.png" alt="">
                                    </div>
                                    <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>sale</span></div>
                                    <div class="favorite favorite_left"></div>
                                    <div class="product_info">
                                        <h6 class="product_name"><a href="single.html">DYMO LabelWriter 450 Turbo Thermal Label Printer</a></h6>
                                        <div class="product_price">$410.00</div>
                                    </div>
                                </div>
                                <div class="red_button add_to_cart_button"><a href="#">add to cart</a></div>
                            </div>

                <!-- Product 5 -->

                <div class="product-item women men">
                                <div class="product product_filter">
                                    <div class="product_image">
                                        <img src="images/product_5.png" alt="">
                                    </div>
                                    <div class="favorite"></div>
                                    <div class="product_info">
                                        <h6 class="product_name"><a href="single.html">Pryma Headphones, Rose Gold & Grey</a></h6>
                                        <div class="product_price">$180.00</div>
                                    </div>
                                </div>
                                <div class="red_button add_to_cart_button"><a href="#">add to cart</a></div>
                            </div>

                <!-- Product 6 -->

                <div class="product-item accessories">
                                <div class="product discount product_filter">
                                    <div class="product_image">
                                        <img src="images/product_6.png" alt="">
                                    </div>
                                    <div class="favorite favorite_left"></div>
                                    <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>-$20</span></div>
                                    <div class="product_info">
                                        <h6 class="product_name"><a href="#single.html">Fujifilm X100T 16 MP Digital Camera (Silver)</a></h6>
                                        <div class="product_price">$520.00<span>$590.00</span></div>
                                    </div>
                                </div>
                                <div class="red_button add_to_cart_button"><a href="#">add to cart</a></div>
                            </div>

                <!-- Product 7 -->

                <!-- <div class="product-item women">
                                <div class="product product_filter">
                                    <div class="product_image">
                                        <img src="images/product_7.png" alt="">
                                    </div>
                                    <div class="favorite"></div>
                                    <div class="product_info">
                                        <h6 class="product_name"><a href="single.html">Samsung CF591 Series Curved 27-Inch FHD Monitor</a></h6>
                                        <div class="product_price">$610.00</div>
                                    </div>
                                </div>
                                <div class="red_button add_to_cart_button"><a href="#">add to cart</a></div>
                            </div> -->

                <!-- Product 8 -->

                <!-- <div class="product-item accessories">
                                <div class="product product_filter">
                                    <div class="product_image">
                                        <img src="images/product_8.png" alt="">
                                    </div>
                                    <div class="favorite"></div>
                                    <div class="product_info">
                                        <h6 class="product_name"><a href="single.html">Blue Yeti USB Microphone Blackout Edition</a></h6>
                                        <div class="product_price">$120.00</div>
                                    </div>
                                </div>
                                <div class="red_button add_to_cart_button"><a href="#">add to cart</a></div>
                            </div> -->

                <!-- Product 9 -->

                <!-- <div class="product-item men">
                                <div class="product product_filter">
                                    <div class="product_image">
                                        <img src="images/product_9.png" alt="">
                                    </div>
                                    <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>sale</span></div>
                                    <div class="favorite favorite_left"></div>
                                    <div class="product_info">
                                        <h6 class="product_name"><a href="single.html">DYMO LabelWriter 450 Turbo Thermal Label Printer</a></h6>
                                        <div class="product_price">$410.00</div>
                                    </div>
                                </div>
                                <div class="red_button add_to_cart_button"><a href="#">add to cart</a></div>
                            </div> -->

                <!-- Product 10 -->

                <!-- <div class="product-item men">
                                <div class="product product_filter">
                                    <div class="product_image">
                                        <img src="images/product_10.png" alt="">
                                    </div>
                                    <div class="favorite"></div>
                                    <div class="product_info">
                                        <h6 class="product_name"><a href="single.html">Pryma Headphones, Rose Gold & Grey</a></h6>
                                        <div class="product_price">$180.00</div>
                                    </div>
                                </div>
                                <div class="red_button add_to_cart_button"><a href="#">add to cart</a></div>
                            </div> -->
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>