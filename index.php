<?php
    include $_SERVER['DOCUMENT_ROOT'].'config/init.php';
    include 'inc/header.php';
    $User = new user();
    $user_info = $User->getUserbySessionToken($_SESSION['token']);
?>
    <!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="hero-items owl-carousel">
            <?php
                $Sale = new sale();
                $sales = $Sale->getAllSaleWithLimit(1,2);
                foreach ($sales as $key => $sale) {
                    $category = $Category->getCategorybyId($sale->categoryid); 
                    if (isset($sale->image) && !empty($sale->image) && file_exists(UPLOAD_PATH.'sale/'.$sale->image)){
                        $thumbnail = UPLOAD_URL.'sale/'.$sale->image;
                        // debugger($thumbnail);
                    }else{
                        $thumbnail = UPLOAD_URL.'noimg.png';
                    }
            ?>
                    <div class="single-hero-items set-bg" data-setbg="<?php echo $thumbnail ?>">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-5">
                                    <span><?php echo $category[0]->categoryname ?></span>
                                    <h1><?php echo $sale->productname ?></h1>
                                    <p><?php echo substr(html_entity_decode($sale->description), 0,200)."..." ?></p>
                                    <a href="product?id=<?php echo $sale->productid ?>" class="primary-btn">Shop Now</a>
                                </div>
                            </div>
                            <div class="off-card">
                                <h2><span><?php echo $sale->discount ?>%</span> OFF</h2>
                            </div>
                        </div>
                    </div>
            <?php
                }
            ?>
            <!-- <div class="single-hero-items set-bg" data-setbg="img/hero-2.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>Bag,kids</span>
                            <h1>Black friday</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore</p>
                            <a href="#" class="primary-btn">Shop Now</a>
                        </div>
                    </div>
                    <div class="off-card">
                        <h2>Sale <span>50%</span></h2>
                    </div>
                </div>
            </div> -->
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Banner Section Begin -->
    <div class="banner-section spad">
        <div class="container-fluid">
            <div class="row">
                    <?php
                        $Category = new category();
                        $categories = $Category->getAllCategory();
                        // debugger($categories[0]->id);

                        // $yawn = 0;
                            foreach ($categories as $key => $category) {    
                                // debugger($products);
                                            if (isset($category->image) && !empty($category->image) && file_exists(UPLOAD_PATH.'category/'.$category->image)){
                                                $thumbnail = UPLOAD_URL.'category/'.$category->image;
                                                // debugger($thumbnail);
                                            }else{
                                                $thumbnail = UPLOAD_URL.'noimg.png';
                                            }
                    ?>
                                <div class="col-lg-4">
                                    <a href="shop?id=<?php echo $category->id ?>">
                                        <div class="single-banner">
                                        <img src="<?php echo $thumbnail ?>" alt="">
                                        <div class="inner-text">
                                            <h4><?php echo $category->categoryname ?></h4>
                                        </div>
                                    </div>
                                    </a>
                                </div>

                    <?php  
                            }
                    ?>
                <!-- <div class="col-lg-4">
                    <div class="single-banner">
                        <img src="img/banner-2.jpg" alt="">
                        <div class="inner-text">
                            <h4>Women’s</h4>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <!-- Banner Section End -->

    <!-- Women Banner Section Begin -->
    <section class="women-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="product-large set-bg" data-setbg="img/products/women-large.jpg">
                        <h2>AD 1</h2>
                        <a href="#">Know More</a>
                    </div>
                </div>
                <div class="col-lg-8 offset-lg-1">
                    <div class="filter-control">
                        <ul>
                            <li class="active">Recently Added</li>
                        </ul>
                    </div>
                    <div class="product-slider owl-carousel">
                        <?php
                            $Product = new product();
                            $products = $Product->getAllProductWithLimit(0,3);
                            $Fav = new fav();
                            foreach ($products as $key => $product) {
                        ?>
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
                                        <div class="sale">Sale</div>
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
                        <?php
                            }
                        ?>
                        <!-- <div class="product-item">
                            <div class="pi-pic">
                                <img src="img/products/women-2.jpg" alt="">
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
                                <div class="catagory-name">Shoes</div>
                                <a href="#">
                                    <h5>Guangzhou sweater</h5>
                                </a>
                                <div class="product-price">
                                    $13.00
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Women Banner Section End -->

    <!-- Deal Of The Week Section Begin-->
    <!-- <section class="deal-of-week set-bg spad" data-setbg="img/time-bg.jpg">
        <div class="container">
            <div class="col-lg-6 text-center">
                <div class="section-title">
                    <h2>Deal Of The Week</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed<br /> do ipsum dolor sit amet,
                        consectetur adipisicing elit </p>
                    <div class="product-price">
                        $35.00
                        <span>/ HanBag</span>
                    </div>
                </div>
                <div class="countdown-timer" id="countdown">
                    <div class="cd-item">
                        <span>56</span>
                        <p>Days</p>
                    </div>
                    <div class="cd-item">
                        <span>12</span>
                        <p>Hrs</p>
                    </div>
                    <div class="cd-item">
                        <span>40</span>
                        <p>Mins</p>
                    </div>
                    <div class="cd-item">
                        <span>52</span>
                        <p>Secs</p>
                    </div>
                </div>
                <a href="#" class="primary-btn">Shop Now</a>
            </div>
        </div>
    </section> -->
    <!-- Deal Of The Week Section End -->

    <!-- Man Banner Section Begin -->
    <section class="man-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="filter-control">
                        <ul>
                            <li class="active">Most Viewed</li>
                        </ul>
                    </div>
                    <div class="product-slider owl-carousel">
                        <?php
                            $Product = new product();
                            $products = $Product->getAllProductWithLimit(3,3);
                            $Fav = new fav();
                            foreach ($products as $key => $product) {
                        ?>
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
                                        <div class="sale">Sale</div>
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
                        <?php
                            }
                        ?>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="product-large set-bg m-large" data-setbg="img/products/man-large.jpg">
                        <h2>AD-2</h2>
                        <a href="#">Know More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Man Banner Section End -->

    <!-- Instagram Section Begin -->
    <div class="instagram-photo">
        <div class="insta-item set-bg" data-setbg="img/insta-1.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">colorlib_Collection</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="img/insta-2.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">colorlib_Collection</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="img/insta-3.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">colorlib_Collection</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="img/insta-4.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">colorlib_Collection</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="img/insta-5.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">colorlib_Collection</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="img/insta-6.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">colorlib_Collection</a></h5>
            </div>
        </div>
    </div>
    <!-- Instagram Section End -->

    <!-- Latest Blog Section Begin -->
    <section class="latest-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>From The Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-blog">
                        <img src="img/latest-1.jpg" alt="">
                        <div class="latest-text">
                            <div class="tag-list">
                                <div class="tag-item">
                                    <i class="fa fa-calendar-o"></i>
                                    May 4,2019
                                </div>
                                <div class="tag-item">
                                    <i class="fa fa-comment-o"></i>
                                    5
                                </div>
                            </div>
                            <a href="#">
                                <h4>The Best Street Style From London Fashion Week</h4>
                            </a>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-blog">
                        <img src="img/latest-2.jpg" alt="">
                        <div class="latest-text">
                            <div class="tag-list">
                                <div class="tag-item">
                                    <i class="fa fa-calendar-o"></i>
                                    May 4,2019
                                </div>
                                <div class="tag-item">
                                    <i class="fa fa-comment-o"></i>
                                    5
                                </div>
                            </div>
                            <a href="#">
                                <h4>Vogue's Ultimate Guide To Autumn/Winter 2019 Shoes</h4>
                            </a>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-blog">
                        <img src="img/latest-3.jpg" alt="">
                        <div class="latest-text">
                            <div class="tag-list">
                                <div class="tag-item">
                                    <i class="fa fa-calendar-o"></i>
                                    May 4,2019
                                </div>
                                <div class="tag-item">
                                    <i class="fa fa-comment-o"></i>
                                    5
                                </div>
                            </div>
                            <a href="#">
                                <h4>How To Brighten Your Wardrobe With A Dash Of Lime</h4>
                            </a>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="benefit-items">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="img/icon-1.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Free Shipping</h6>
                                <p>For all order over Rs.3000</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="img/icon-2.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Delivery On Time</h6>
                                <p>If good have prolems</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="img/icon-1.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Cash On Delivery</h6>
                                <p>100% secure payment</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Blog Section End -->
<?php
    include 'inc/footer.php'; 
?>
    