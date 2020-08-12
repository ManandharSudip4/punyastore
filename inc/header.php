
<?php 
    define('BREADCRUMBS', ['index']);
    define('BB', ['Blog']);
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fashi | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="assets/css/elegant-icons.css" type="text/css"> 
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="assets/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <style type="text/css">
        html{
             scroll-behavior: smooth;
        }
    </style>
</head>
    
<body>
    <?php
        $Category = new category();
        $categories = $Category->getAllCategory();
        // if ($categories) {
        //     debugger($categories);
        // }
    ?>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header-section ">
        <div class="header-top">
            <div class="container">
                <div class="ht-left">
                    <div class="mail-service">
                        <i class=" fa fa-envelope"></i>
                        manandharsudip8@gmail.com
                    </div>
                    <div class="top-social">
                        <a href="#"><i class="ti-facebook"></i></a>
                        <a href="#"><i class="ti-twitter-alt"></i></a>
                        <a href="#"><i class="ti-linkedin"></i></a>
                        <a href="#"><i class="ti-pinterest"></i></a>
                    </div>
                </div>
                <div class="ht-right">
                    <a href="./login" class="login-panel"><i class="fa fa-user"></i>Login</a>
                        <a href="tel:+977986-1287059" class="phone-service" style="color: black; padding-right: 20px;"><i class=" fa fa-phone"></i>986-1287059</a>
                    <!-- <div class="lan-selector">
                        <select class="language_drop" name="countries" id="countries" style="width:300px;">
                            <option value='yt' data-image="img/flag-1.jpg" data-imagecss="flag yt"
                                data-title="English">English</option>
                            <option value='yu' data-image="img/flag-2.jpg" data-imagecss="flag yu"
                                data-title="Bangladesh">German </option>
                        </select>
                    </div> -->
                    <!-- <div class="top-social">
                        <a href="#"><i class="ti-facebook"></i></a>
                        <a href="#"><i class="ti-twitter-alt"></i></a>
                        <a href="#"><i class="ti-linkedin"></i></a>
                        <a href="#"><i class="ti-pinterest"></i></a>
                    </div> -->
                </div>
            </div>
        </div>
        <div class="header-bottom header-sticky">
            <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="./index.php">
                                <img src="img/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div class="advanced-search">
                            <button type="button" class="category-btn">All Categories</button>
                            <div class="input-group">
                                <input type="text" placeholder="What do you need?">
                                <button type="button"><i class="ti-search"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 text-right col-md-3">
                        <ul class="nav-right">
                            <li class="cart-price">$150.00</li>
                            <li class="cart-icon">
                                <a href="#">
                                    <i class="icon_heart_alt"></i>  
                                    <span><?php
                                    $Fav = new fav();
                                    $favs = $Fav->getNumberFavByProducts();
                                    echo $favs[0]->total;
                                    ?></span>
                                </a>
                                <div class="cart-hover">
                                    <div class="select-items">
                                        <table>
                                            <tbody>
                                                <?php
                                                    $favi = $Fav->getAllFav(0,2);
                                                    $Product = new product();
                                                    // debugger($favi);
                                                    foreach ($favi as $key => $fav) {
                                                    $products= $Product->getProductbyId($fav->product_id);
                                                    // debugger($fav);
                                                    if (isset($products[0]->image) && !empty($products[0]->image) && file_exists(UPLOAD_PATH.'product/'.$products[0]->image)){
                                                        $thumbnail = UPLOAD_URL.'product/'.$products[0]->image;
                                                        // debugger($thumbnail);
                                                    }else{
                                                        $thumbnail = UPLOAD_URL.'noimg.png';
                                                    }
                                                ?>
                                                <tr>
                                                    <td class="si-pic" style="width: 30%">
                                                        <img src="<?php echo $thumbnail ?>" alt="">
                                                    </td>
                                                    <td class="si-text" style="width: 60%">
                                                        <div class="product-selected">
                                                            <p>Rs.<?php echo $products[0]->acprice ?></p>
                                                            <h6><?php echo $products[0]->productname ?></h6>
                                                        </div>
                                                    </td>
                                                    <td class="si-close" style="width: 10%">
                                                        <i class="ti-close"></i>
                                                    </td>
                                                </tr>
                                                <?php
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="select-total">
                                        <?php
                                            $total1 = 0;
                                            $favs  = $Fav->getAllFavWithoutLimit();
                                            // debugger($carts);
                                            foreach ($favs as $key => $fav) {
                                                $products = $Product->getProductbyId($fav->product_id);
                                                $total1 += $products[0]->acprice; 
                                            }
                                        ?>
                                        <span>total:</span>
                                        <h5>Rs. <?php echo $total1 ?></h5>
                                    </div>
                                    <div class="select-button">
                                        <a href="./fav" class="primary-btn view-card">VIEW ALL FAVOURITE</a>
                                        <a href="./check-out.php" class="primary-btn checkout-btn">CHECK OUT</a>
                                    </div>
                                </div>
                            </li>
                            <li class="cart-icon">
                                <a href="#">
                                    <i class="icon_bag_alt"></i>
                                    <?php 
                                        $InCart = new incart();
                                        $incartstotal = $InCart->getNumberInCartByProducts();
                                        // debugger($incarts[0]->total);
                                    ?>
                                    <span><?php echo $incartstotal[0]->total ?></span>
                                </a>
                                <div class="cart-hover">
                                    <div class="select-items">
                                        <table>
                                            <tbody>
                                                <?php
                                                    $incarts = $InCart->getActiveInCartWithLimit(0,2);
                                                    $Product = new product();
                                                    // debugger($favi);
                                                    foreach ($incarts as $key => $incart) {
                                                    $products= $Product->getProductbyId($incart->product_id);
                                                    // debugger($fav);
                                                    if (isset($products[0]->image) && !empty($products[0]->image) && file_exists(UPLOAD_PATH.'product/'.$products[0]->image)){
                                                        $thumbnail = UPLOAD_URL.'product/'.$products[0]->image;
                                                        // debugger($thumbnail);
                                                    }else{
                                                        $thumbnail = UPLOAD_URL.'noimg.png';
                                                    }
                                                ?>
                                                <tr>
                                                    <td class="si-pic" style="width: 30%">
                                                        <img src="<?php echo $thumbnail ?>" alt="">
                                                    </td>
                                                    <td class="si-text" style="width: 60%">
                                                        <div class="product-selected">
                                                            <p>Rs.<?php echo $products[0]->acprice ?></p>
                                                            <h6><?php echo $products[0]->productname ?></h6>
                                                        </div>
                                                    </td>
                                                    <td class="si-close" style="width: 10%">
                                                        <i class="ti-close"></i>
                                                    </td>
                                                </tr>
                                                <?php
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="select-total">
                                        <?php
                                            $total2 = 0;
                                            $carts  = $InCart->getAllInCart();
                                            // debugger($carts);
                                            foreach ($carts as $key => $cart) {
                                                $products = $Product->getProductbyId($cart->product_id);
                                                $total2 += $cart->quantity*$products[0]->acprice; 
                                            }
                                        ?>
                                        <span>Total:</span>
                                        <h5>Rs. <?php echo $total2 ?></h5>
                                    </div>
                                    <div class="select-button">
                                        <a href="./shopping-cart" class="primary-btn view-card">VIEW ALL In Cart</a>
                                        <a href="./check-out.php" class="primary-btn checkout-btn">CHECK OUT</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="nav-item">
            <div class="container">
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <?php
                            foreach ($categories as $key => $category) {
                        ?>
                            <li><a href="shop?id=<?php echo $category->id ?>" style="padding-left: 30px; padding-right: 30px; letter-spacing: 1px; font-weight: 0px"><?php echo $category->categoryname; ?></a></li>
                        <?php
                            }
                        ?>
                    </ul>
                    <ul>
                        <li><a href="#">Menu</a>
                            <ul class="dropdown">
                            <li><a href="./blog.php">Blog</a></li>
                            <li><a href="./shopping-cart.php">Shopping Cart</a></li>
                            <li><a href="./check-out.php">Checkout</a></li>
                            <li><a href="./contact">Contact</a></li>
                            <li><a href="./faq.php">Faq</a></li>
                            <li><a href="./register.php">Register</a></li>
                            <li><a href="./login.php">Login</a></li>
                        </ul>
                        </li>
                    </ul>
                    <!-- <ul>
                        <li>
                            <div class="nav-depart">
                                <div class="depart-btn">
                                    <i class="ti-menu"></i>
                                    <span>Menu</span>
                                    <ul class="dropdown">
                                        <li><a href="#">Categories</a></li>
                                        <li><a href="./shop.php">Shop</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul> -->
                </nav>
                
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Breadcrumb Section Begin -->
    <?php
        if(!in_array(pathinfo($_SERVER['PHP_SELF'],PATHINFO_FILENAME),BREADCRUMBS)){
    ?>
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="index"><i class="fa fa-home"></i> Home</a>
                        <!-- define('BB',['Blog']); -->
                        <?php
                            $ar = array($header);
                            if(isset($header) && !empty($header)){
                                if(isset($bread) && !empty($bread)){
                                    if(in_array('Blog', $ar)){
                        ?>          
                                    <a href="blog"><?php echo $header ?></a>
                                    <span><?php echo $bread ?> Detail</span>
                        <?php
                                    }else{
                        ?>
                                    <a href="shop?id=<?php echo $product_info->categoryid; ?>"><?php echo $header ?></a>
                                    <span><?php echo $bread ?> Detail</span>        
                        <?php 
                                    }
                                }else{
                        ?>
                                    <span><?php echo $header ?></span>
                        <?php
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        }
    ?>
    <!-- Breadcrumb Section Ends -->
