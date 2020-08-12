<?php
    include $_SERVER['DOCUMENT_ROOT'].'config/init.php';
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $cat_id = (int)$_GET['id'];
        if($cat_id){
            $Category = new category();
            $category_info = $Category->getCategorybyId($cat_id);
            //debugger($category_info);
            if ($category_info) {
                $category_info = $category_info[0];
                $breads = $category_info->categoryname ;
            }else{
                redirect('index');
            }
        }else{
            redirect('index');
        }
        }else{redirect('index');
    }
    $header = $category_info->categoryname;
    $User = new user();
    $user_info = $User->getUserbySessionToken($_SESSION['token']);
    // debugger($_SESSION['token']);
    // debugger($user_info[0]->id);
    include 'inc/header.php';
?>
    <!-- Product Shop Section Begin -->
    <section class="product-shop spad">
        <div class="container">
            <div class="row">
                <?php include 'inc/sidebar.php'; ?>
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="product-show-option">
                        <div class="row">
                            <!-- <div class="col-lg-7 col-md-7">
                                <div class="select-option">
                                    <select class="sorting">
                                        <option value="">Default Sorting</option>
                                    </select>
                                    <select class="p-show">
                                        <option value="">Show:</option>
                                    </select>
                                </div>
                            </div> -->
                            <div class="col-lg-12 col-md-12 text-center">
                                <p><?php echo $header ?></p>
                            </div>
                        </div>
                    </div>
                    <?php
                                $Product = new product();
                                $products = $Product->getAllProductByCategoryWithLimit($cat_id,0,3);
                                $Fav = new fav();
                                // debugger($products);
                            ?>
                    <div class="product-list">
                        <div class="row">
                            <div class="col-lg-4 col-sm-6">
                                <div class="product-item">
                                    <div class="pi-pic">
                                        <img src="img/products/product-1.jpg" alt="">
                                        <div class="sale pp-sale">Sale</div>
                                        <div class="icon">
                                            <form method="post" action="#">
                                                <div class="stars col-md-6">
                                                    <div class="favitem form-group" style="width: 270px;">
                                                        <input type="radio" name="star-0" id="star-5" value="5">
                                                        <label for="star-5" ></label>
                                                    </div>
                                                </div>
                                            </form>
                                            <!-- <i class="icon_heart_alt"></i> -->
                                        </div>
                                        <ul>
                                            <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                            <li class="quick-view"><a href="product">Quick View</a></li>
                                            <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="pi-text">
                                        <div class="catagory-name">Towel</div>
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
                            <div class="col-lg-4 col-sm-6">
                                <div class="product-item">
                                    <div class="pi-pic">
                                        <img src="img/products/product-2.jpg" alt="">
                                        <div class="icon">
                                          
                                            <div class="favitem form-group" style="width: 270px;">
                                                <input type="radio" name="star-1" id="star-4" value="4" >
                                                <label for="star-4"></label>
                                            </div>
                                          
                                            <a href="#"><i style="color: black" class="icon_heart"></i></a>
                                           
                                        </div>
                                        <ul>
                                            <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                            <li class="quick-view"><a href="product">Quick View</a></li>
                                            <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="pi-text">
                                        <div class="catagory-name">Coat</div>
                                        <a href="#">
                                            <h5>Guangzhou sweater</h5>
                                        </a>
                                        <div class="product-price">
                                            $13.00
                                            <span>$35.00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="product-item">
                                    <div class="pi-pic">
                                        <img src="img/products/product-3.jpg" alt="">
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
                                            $34.00
                                            <span>$35.00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                                foreach ($products as $key => $product) {
                            ?>
                            <div class="col-lg-4 col-sm-6">
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
                            <div class="col-lg-4 col-sm-6">
                                <div class="product-item">
                                    <div class="pi-pic">
                                        <img src="img/products/product-7.jpg" alt="">
                                        <div class="sale pp-sale">Sale</div>
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
                                        <div class="catagory-name">Towel</div>
                                        <a href="#">
                                            <h5>Pure Pineapple</h5>
                                        </a>
                                        <div class="product-price">
                                            $64.00
                                            <span>$35.00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="product-item">
                                    <div class="pi-pic">
                                        <img src="img/products/product-8.jpg" alt="">
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
                                            <h5>2 Layer Windbreaker</h5>
                                        </a>
                                        <div class="product-price">
                                            $44.00
                                            <span>$35.00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="product-item">
                                    <div class="pi-pic">
                                        <img src="img/products/product-9.jpg" alt="">
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
                                            <h5>Converse Shoes</h5>
                                        </a>
                                        <div class="product-price">
                                            $34.00
                                            <span>$35.00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="loading-more">
                        <i class="icon_loading"></i>
                        <a href="#">
                            Loading More
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->

    <?php
    include 'inc/footer.php';
    ?>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
    <!-- <script type="text/javascript">
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
    </script> -->