<?php
    include $_SERVER['DOCUMENT_ROOT'].'config/init.php';
    $header = 'Shopping Cart';
    include 'inc/header.php';
?>

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart-table">
                        <table>
                            <thead>
                                <tr>
                                    <th style="text-align: center;">Image</th>
                                    <th class="p-name" style="text-align: center;">Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th><i class="ti-close"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $InCart = new incart();
                                    $incarts = $InCart->getActiveInCartWithLimit(0,3);
                                    // debugger($incarts);
                                    foreach ($incarts as $key => $incart) {
                                        $products = $Product->getProductbyId($incart->product_id);
                                        // debugger($products);
                                ?>
                                        <tr>
                                            <?php
                                                if (isset($products[0]->image) && !empty($products[0]->image) && file_exists(UPLOAD_PATH.'product/'.$products[0]->image)){
                                                    $thumbnail = UPLOAD_URL.'product/'.$products[0]->image;
                                                    // debugger($thumbnail);
                                                }else{
                                                    $thumbnail = UPLOAD_URL.'noimg.png';
                                                }
                                            ?>
                                            <td class="cart-pic first-row" style="text-align: center;"><img src="<?php echo $thumbnail ?>" alt=""></td>
                                            <td class="cart-title first-row" style="text-align: center;">
                                                <h5><?php echo $products[0]->productname?></h5>
                                            </td>
                                            <td class="p-price first-row">Rs. <?php echo $products[0]->acprice?></td>
                                            <td class="qua-col first-row">
                                                        <h5><?php echo $incart->quantity ?></h5>
                                            </td>
                                            <td class="total-price first-row">Rs. <?php echo ($incart->quantity*$products[0]->acprice)?></td>
                                            <td class="close-td first-row"><i class="ti-close"></i></td>
                                        </tr>
                                <?php
                                    }
                                ?>      
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <!-- <div class="cart-buttons">
                                <a href="#" class="primary-btn continue-shop">Continue shopping</a>
                                <a href="#" class="primary-btn up-cart">Update cart</a>
                            </div> -->
                            <div class="discount-coupon">
                                <h6>Discount Codes</h6>
                                <form action="#" class="coupon-form">
                                    <input type="text" placeholder="Enter your codes">
                                    <button type="submit" class="site-btn coupon-btn">Apply</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4 offset-lg-4">
                            <div class="proceed-checkout">
                                <ul>   
                                    <?php
                                        $total = 0;
                                        $carts  = $InCart->getAllInCart();
                                        // debugger($carts);
                                        foreach ($carts as $key => $cart) {
                                            $products = $Product->getProductbyId($cart->product_id);
                                            $total += $cart->quantity*$products[0]->acprice; 
                                        }
                                    ?>
                                    <li class="subtotal">Subtotal <span>Rs. <?php echo $total ?></span></li>
                                    <li class="cart-total">Total <span>Rs. <?php echo $total ?></span></li>
                                </ul>
                                <a href="#" class="proceed-btn">PROCEED TO CHECK OUT</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

<?php
    include 'inc/footer.php';
?>