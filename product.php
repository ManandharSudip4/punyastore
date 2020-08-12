<?php
    include $_SERVER['DOCUMENT_ROOT'].'config/init.php';
    $bread = 'Product';
    if (isset($_GET['id']) && !empty($_GET['id'])) {
            // debugger($_GET);
        $product_id = (int)$_GET['id'];
        if($product_id){
            $Product = new product();
            $product_info = $Product->getProductbyId($product_id);
            if ($product_info) {
                $product_info = $product_info[0];
                $bread = $product_info->productname ;
                // debugger($product_info);
                $data = array(
                    'view' => $product_info->view + 1
                );
                $Product->updateProductbyId($data,$product_id);
            }else{
                redirect('index');
            }
        }else{
            redirect('index');
        }
        }else{redirect('index');
    }
    $Category = new category();
    $categories = $Category->getCategorybyId($product_info->categoryid);
    $header = $categories[0]->categoryname;
    $Fav = new fav();
    $User = new user();
    $user_info = $User->getUserbySessionToken($_SESSION['token']);
    // debugger($subheader);
    include 'inc/header.php';
?>
    <!-- Product Shop Section Begin -->
    <section class="product-shop spad page-details">
        <div class="container">
            <div class="row">
                <?php include'inc/sidebar.php';?>
                    <div class="col-lg-9 order-1 order-lg-2">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="product-pic-zoom">
                                <?php
                                    if (isset($product_info->image) && !empty($product_info->image) && file_exists(UPLOAD_PATH.'product/'.$product_info->image)){
                                        $thumbnail = UPLOAD_URL.'product/'.$product_info->image;
                                        // debugger($thumbnail);
                                    }else{
                                        $thumbnail = UPLOAD_URL.'noimg.png';
                                    }
                                ?>
                                <img class="product-big-img" src="<?php echo $thumbnail; ?>" alt="">
                                <!-- <div class="zoom-icon">
                                    <i class="fa fa-search-plus"></i>
                                </div> -->
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="product-details">
                                <div class="pd-title">
                                    <span><?php echo $header ?></span>
                                            <div class="icon" style="float: right;">
                                                <?php
                                                    $value = $user_info[0]->id;
                                                    $abc = 0;
                                                    // debugger($user_info[0]->id);
                                                    $favs = $Fav->getFavbyId($product_info->id);
                                                    // debugger($favs);
                                                    if(isset($favs[0]->user_id) && !empty($favs[0]->user_id) ){
                                                        $abc = $favs[0]->user_id;

                                                    }
                                                    // $value = $favs[0]->product_id;
                                                    if($value == $abc){
                                                ?>
                                                    <a href="#"><i style="color: black" class="icon_heart"></i></a>
                                                <?php
                                                    }else{
                                                ?>
                                                    <div class="favitem form-group" style="width: 270px;">
                                                        <input type="radio" name="star-<?php echo $product_info->id ?>" id="star-<?php echo $product_info->id ?>" value="<?php echo $product_info->id ?>" onclick="favvalue(<?php echo $product_info->id ?>)">
                                                        <label for="star-<?php echo $product_info->id ?>"></label>
                                                    </div>
                                                <?php
                                                    }
                                                ?>
                                            </div>
                                    <h3><?php echo $product_info->productname; ?></h3>
                                </div>
                                <?php
                                    $Rating = new rating();
                                    $count_rating = 0;
                                    $rates = $Rating->getRatingbyId($product_info->id);
                                    // debugger($rates);
                                    $sum_of_ratings = 0;
                                    if(!empty($rates)){
                                        foreach ($rates as $key => $rate) {
                                            $sum_of_ratings += $rate->rating;
                                            $count_rating += 1;
                                        }
                                    $average_rating=($sum_of_ratings/$count_rating);
                                    }
                                ?>
                                <div class="Starss" style="--rate:<?php echo isset($average_rating)?$average_rating:0; ?>; align-content: center;" aria-label="Rating of this product is 2.3 out of 5."><span style="font-size: 20px;color: #999591;">(<?php echo $count_rating ?>)</span></div>
                                <div class="pd-desc">
                                    <p><?php echo html_entity_decode($product_info->description); ?></p>
                                    <h4>Rs. <?php echo $product_info->acprice;  ?><span><?php echo $product_info->cprice;  ?></span></h4>
                                </div>
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="text" value="1" id="quantity" >
                                    </div>
                                    
                                        <input type="hidden" name="incart" id="incart" value="<?php echo substr(md5("Delete-InCart-".$product_info->id.$_SESSION['token']), 3,15) ?>"> 
                                        <a href="#" class="primary-btn pd-cart" id="addtoCart" onclick="addtoCart(<?php echo $product_info->id ?>)">Add To Cart</a>
                                </div>
                                <ul class="pd-tags" style="text-align: center">
                                    <li><span>Delivery Option</span><br>Inside KTM valley only, Cash On Delivery</li>
                                </ul>
                                
                                <!-- <ul class="pd-tags">
                                    <li><span>CATEGORIES</span>: More Accessories, Wallets & Cases</li>
                                    <li><span>TAGS</span>: Clothing, T-shirt, Woman</li>
                                </ul> -->
                                <div class="pd-share">
                                    <div class="p-code">Sku : 00012</div>
                                    <div class="pd-social">
                                        <a href="#"><i class="ti-facebook"></i></a>
                                        <a href="#"><i class="ti-twitter-alt"></i></a>
                                        <a href="#"><i class="ti-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-tab">
                        <div class="tab-item">
                            <ul class="nav" role="tablist" >
                                <li>
                                    <a class="active" data-toggle="tab" href="#tab-1" role="tab">SPECIFICATIONS</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#tab-2" role="tab">Answered Questions (<?php
                                                $Query = new query();
                                                $querycount = $Query->getNumberQueryByProduct($product_info->id);
                                                // debugger($querycount[0]->total);
                                                echo $querycount[0]->total<10 && $querycount[0]->total>0? '0'.$querycount[0]->total : $querycount[0]->total; 
                                             ?>)</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#tab-3" role="tab">
                                        Reviews (<?php
                                                $counts = $Rating->getNumberRatingByProduct($product_info->id);
                                                    // debugger($counts);
                                                    echo $counts[0]->total<10 && $counts[0]->total>0? '0'.$counts[0]->total : $counts[0]->total; 
                                             ?>)</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-item-content">
                            <div class="tab-content">
                                <div class="tab-pane fade-in active" id="tab-1" role="tabpanel">
                                    <div class="product-content" style="padding-bottom: 0px">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h5>Description</h5>
                                                <p><?php echo html_entity_decode($product_info->description); ?></p>
                                            </div>
                                            <!-- <div class="col-lg-5">
                                                <img src="img/product-single/tab-desc.jpg" alt="">
                                            </div> -->
                                        </div>
                                    </div>
                                    <div class="specification-table" style="padding-top: 0px">
                                        <table>
                                            <tr>
                                                <td class="p-catagory">Customer Rating</td>
                                                <td>
                                                    <div class="Starss" style="--rate:<?php echo isset($average_rating)?$average_rating:0; ?>; align-content: center;" aria-label="Rating of this product is 2.3 out of 5."><span style="font-size: 20px;color: #999591;">(<?php echo $count_rating ?>)</span></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Price</td>
                                                <td>
                                                    <div class="p-price">Rs. <?php echo $product_info->acprice; ?></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Add To Cart</td>
                                                <td>
                                                    <div class="cart-add">+ add to cart</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Availability</td>
                                                <td>
                                                    <div class="p-stock">22 in stock</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Weight</td>
                                                <td>
                                                    <div class="p-weight"><?php echo $product_info->weight; ?></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Size</td>
                                                <td>
                                                    <div class="p-size"><?php echo $product_info->size; ?></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Made Of</td>
                                                <td><span class="p-stock"><?php echo $product_info->madeof; ?></span></td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Sku</td>
                                                <td>
                                                    <div class="p-code">00012</div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-2" role="tabpanel">
                                    <div class="product-content">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h5>Answered Questions</h5>
                                                <div class="customer-review-option">
                                        <h4><?php
                                                echo $querycount[0]->total<10 && $querycount[0]->total>0? '0'.$querycount[0]->total : $querycount[0]->total; 
                                             ?> Answered Questions
                                         </h4>
                                         <?php
                                            $queries = $Query->getAllAcceptQueryByProduct($product_info->id);
                                            // debugger($queries);
                                         ?>
                                        <div class="post-comments" id="querys">
                                            <?php
                                                $querys = $Query->getAllAcceptQueryByProduct($product_id);
                                                // debugger($querys,true);
                                            if($querys){
                                                foreach ($querys as $key => $query) {
                                            ?>
                                            <!-- query -->
                                            <div class="media">
                                                <div class="media-left">
                                                    <img class="media-object" src="img/product-single/avatar-1.png" alt="">
                                                </div>
                                                <div class="media-body">
                                                    <div class="media-heading">
                                                        <h4 style="margin-bottom: 0px"><?php echo $query->name ?></h4>
                                                        <span class="time"><?php echo date('M d, Y h:m a',strtotime($query->created_date)) ?></span>
                                                        <a href="#ReplySection" class="reply" onclick="reply(this);" data-queryid="<?php echo $query->id ?>">Reply</a>                          
                                                    </div>
                                                    <p><?php echo html_entity_decode($query->message) ?></p>
                                                    <?php
                                                        // debugger($product_id,true);
                                                        $replies = $Query->getAllAcceptReplyByProductByQuery($product_id,$query->id);
                                                            // debugger($replies,true);         
                                                        if($replies){
                                                            foreach ($replies as $key => $reply) {
                                                    ?>
                                                    <!-- query -->
                                                    <div class="media">
                                                        <div class="media-left">
                                                            <img class="media-object" src="img/product-single/avatar-1.png" alt="">
                                                        </div>
                                                        <div class="media-body">
                                                            <div class="media-heading">
                                                                <h4 style="margin-bottom: 0px"><?php echo $reply->name ?></h4>
                                                                <span class="time"><?php echo date('M d, Y h:m a', strtotime($reply->created_date)); ?></span>
                                                                <a href="#ReplySection" class="reply" onclick="reply(this);" data-queryid="<?php echo $query->id ?>">Reply</a>
                                                            </div>
                                                            <p><?php echo html_entity_decode($reply->message); ?></p>
                                                        </div>
                                                    </div>
                                                    <!-- /query -->
                                                    <?php
                                                            }
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                            <!-- /query -->
                                            <?php
                                                }
                                            }
                                            ?>
                                            
                                        </div>
                                        <div class="leave-comment" id="ReplySection">
                                            <h4>Any Queries?</h4>
                                            <form method="post" action="process/query" class="comment-form" >
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <input type="text" name="name" required="required" max="15" placeholder="Name">
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <textarea name="query" placeholder="Messages"></textarea>
                                                    </div>
                                                    <input type="hidden" name="productid" value=<?php echo($product_info->id); ?> >
                                                    <input type="hidden" name="queryid" id="query" value="">
                                                    <button type="submit" class="site-btn" style="left: 50%; align-self: center;">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                            </div>
                                            <!-- <div class="col-lg-5">
                                                <img src="img/product-single/tab-desc.jpg" alt="">
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-3" role="tabpanel">
                                    <div class="customer-review-option">
                                        <h4><?php
                                                echo $counts[0]->total<10 && $counts[0]->total>0? '0'.$counts[0]->total : $counts[0]->total; 
                                             ?> Reviews
                                         </h4>
                                         <?php
                                            $ratings = $Rating->getAllRatingById($product_info->id);
                                            // debugger($ratings);
                                         ?>
                                        <div class="comment-option">
                                            <?php
                                                foreach ($ratings as $key => $rating) {
                                            ?>
                                            <div class="co-item">
                                                <div class="avatar-pic">
                                                    <img src="img/product-single/avatar-1.png" alt="">
                                                </div>
                                                <div class="avatar-text">
                                                    <div class="Starss" style="--rate:<?php echo isset($rating->rating)?$rating->rating:0; ?>; "></div>
                                                    <h5><?php echo $rating->name; ?> <span><?php echo date("d M Y",strtotime($rating->created_date)); ?></span></h5>
                                                    <div class="at-reply"><?php echo $rating->review; ?></div>
                                                </div>
                                            </div>
                                            <?php
                                                }
                                            ?>
                                        </div>
                                        <div class="leave-comment">
                                            <h4>Leave A Comment</h4>
                                            <form method="post" action="process/ratings" class="comment-form">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <input type="text" name="name" required="required" max="15" placeholder="Name">
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="email" name="email" required="required" placeholder="Email">
                                                    </div>
                                                    <div class="stars col-md-6">
                                                        <div class="rating form-group" style="width: 270px;">
                                                            <input type="radio" name="star" class="star star-5" id="star-5" value="5" required="required">
                                                            <label for="star-5" class="star star-5" ></label>
                                                            <input type="radio" name="star" class="star star-4" id="star-4" value="4" >
                                                            <label for="star-4" class="star star-4"></label>
                                                            <input type="radio" name="star" class="star star-3" id="star-3" value="3">
                                                            <label for="star-3" class="star star-3"></label>
                                                            <input type="radio" name="star" class="star star-2" id="star-2" value="2">
                                                            <label for="star-2" class="star star-2"></label>
                                                            <input type="radio" name="star" class="star star-1" id="star-1" value="1">
                                                            <label for="star-1" class="star star-1"></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <textarea name="review" placeholder="Messages"></textarea>
                                                    </div>
                                                    <input type="hidden" name="product_id" value=<?php echo($product_info->id); ?> >
                                                    <button type="submit" class="site-btn" style="left: 50%; align-self: center;">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->

    <!-- Related Products Section End -->
    <div class="related-products spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Related Products</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="img/products/women-1.jpg" alt="">
                            <div class="sale">Sale</div>
                            <div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>
                            <ul>
                                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                <li class="quick-view"><a href="#">+ Quick View</a></li>
                                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">Coat</div>
                            <a href="#">
                                <h5>Pure Pineapple</h5>
                            </a>
                            <div class="product-price">
                                $14.00
                                <span>$35.00</span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    $Product = new product();
                    $products = $Product->getAllProductByCategoryWithLimit($product_info->categoryid,0,4);
                    // debugger($products);
                    foreach ($products as $key => $product) {
                ?>
                <div class="col-lg-3 col-sm-6">
                    <div class="product-item">
                                <div class="pi-pic">
                                    <?php
                                        if (isset($product->image) && !empty($product->image) && file_exists(UPLOAD_PATH.'product/'.$product->image)){
                                            $thumbnail = UPLOAD_URL.'product/'.$product->image;
                                            // debugger($thumbnail);
                                        }else{
                                            $thumbnail = UPLOAD_URL.'noimg.png';
                                        }
                                    ?>
                                    <img src="<?php echo $thumbnail; ?>" alt="">
                                    <div class="icon">
                                            <?php
                                                $value = $user_info[0]->id;
                                                $abc = 0;
                                                // debugger($user_info[0]->id);
                                                $favs = $Fav->getFavbyId($product->id);
                                                // debugger($favs);
                                                if(isset($favs[0]->user_id) && !empty($favs[0]->user_id) ){
                                                    $abc = $favs[0]->user_id;

                                                }
                                                // $value = $favs[0]->product_id;
                                                if($value == $abc){
                                            ?>
                                                <a href="#"><i style="color: black" class="icon_heart"></i></a>
                                            <?php
                                                }else{
                                            ?>
                                                <div class="favitem form-group" style="width: 270px;">
                                                    <input type="radio" name="star-<?php echo $product->id ?>" id="star-<?php echo $product->id ?>" value="<?php echo $product->id ?>" onclick="favvalue(<?php echo $product->id ?>)">
                                                    <label for="star-<?php echo $product->id ?>"></label>
                                                </div>
                                            <?php
                                                }
                                            ?>
                                    </div>
                                    <ul>
                                        <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                        <li class="quick-view"><a href="product?id=<?php echo $product->id ?>">Quick View</a></li>
                                        <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                    </ul>
                                </div>
                                <div class="pi-text">
                                    <div class="catagory-name"><?php echo $product->category; ?></div>
                                    <a href="#">
                                        <h5><?php echo $product->productname; ?></h5>
                                    </a>
                                    <div class="product-price">
                                        Rs. <?php echo $product->acprice; ?>
                                        <span>Rs. <?php echo $product->cprice; ?></span>
                                    </div>
                                </div>
                            </div>
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
    <!-- Related Products Section End -->
<?php
    include 'inc/footer.php';
?>
<script type="text/javascript">   
    function reply(element){
        console.log(element);
        var queryid = $(element).data('queryid');
        console.log(queryid);
        $('#query').val(queryid);
    }

    function addtoCart(pid){
        var ac_pid = pid;
        var quantity = $('#quantity').val();
        var text = $('#addtoCart').html();
        if(text == 'Add To Cart'){
            $('#addtoCart').html('Added');
            // console.log(quantity);
            $.ajax({
                url:"process/incart.php",
                type:"POST",
                data:{product_id:ac_pid,quantity:quantity},
                success:function(data,status){
                }
            });

        }else if(text == 'Added'){
            $('#addtoCart').html('Add To Cart');
            // console.log(ac_pid);
            var deleteid = $('#incart').val();
            // console.log(deleteid);
            $.ajax({
                url:"process/incart.php",
                type:"POST",
                data:{id:ac_pid, deleteid:deleteid},
                success:function(data,status){
                    // alert("It's working");
                }
            });
        }
        // console.log(text);
    }

    function favvalue(favp_id){
                var fav_pid = favp_id;
                console.log(fav_pid);
            $.ajax({
                url:"process/fav.php",
                type:"POST",
                data:{product_id:fav_pid},
                success:function(data,status){
                }
            });
            
        }
</script>
