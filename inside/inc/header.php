
<?php

    define('BREADCRUMBS',['contact','category','about','blank']);
    define('CAT_COLOR', ['cat-1','cat-2','cat-3','cat-4']);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>WebMag HTML Template</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:700%7CNunito:300,600" rel="stylesheet"> 

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="assets/css/bootstrap.min.css"/>

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="assets/css/style.css"/>
    <style>
      html{
             scroll-behavior: smooth;
        }
      #gototop{
             position: fixed;
             width: 50px;
             height: 50px;
             background: transparent;
             bottom: 40px;
             right: 50px;
             text-decoration: none;
             text-align: center;
             line-height: 50px;
             font-size: 22px;
        }
  </style>

<style>
    .reviews{
      background: #deddd9;
      box-sizing: border-box;
      text-align: left;
      height: 50px;
      /*box-shadow: 20px 20px 20px 20px rgba(0,0,0,0.5);*/
      border-radius: 5px;
    }
</style>
    <style type="text/css">
        /* 20. preloader */
/* line 585, ../../SAIFUL/Running_project/250 eCommerce_HTML/250 eCommerce_HTML/250 eCommerce_HTML/assets/scss/_common.scss */
.preloader {
  z-index: 999999;
  background-color: #f7f7f7;
  width: 100%;
  height: 100vh;
  position: fixed;
  left: 0;
  right: 0;
  align-content:center;
  -webkit-transition: .6s;
  -o-transition: .6s;
  transition: .6s;
  margin: auto;
}

/* line 601, ../../SAIFUL/Running_project/250 eCommerce_HTML/250 eCommerce_HTML/250 eCommerce_HTML/assets/scss/_common.scss */
.preloader .preloader-circle {
  width: 100px;
  height: 100px;
  top: 50%;
  left: 50%;
  position: relative;
  border-style: solid;
  border-width: 3px;
  border-top-color: #008cff;
  border-bottom-color: transparent;
  border-left-color: transparent;
  border-right-color: transparent;
  z-index: 10;
  border-radius: 50%;
  -webkit-box-shadow: 0 1px 5px 0 rgba(35, 181, 185, 0.15);
  box-shadow: 0 1px 5px 0 rgba(35, 181, 185, 0.15);
  background-color: #ffffff;
  -webkit-animation: zoom 2000ms infinite ease;
  animation: zoom 2000ms infinite ease;
  -webkit-transition: .6s;
  -o-transition: .6s;
  transition: .6s;
}

/* line 622, ../../SAIFUL/Running_project/250 eCommerce_HTML/250 eCommerce_HTML/250 eCommerce_HTML/assets/scss/_common.scss */
.preloader .preloader-circle2 {
  border-top-color: #0078ff;
}

/* line 625, ../../SAIFUL/Running_project/250 eCommerce_HTML/250 eCommerce_HTML/250 eCommerce_HTML/assets/scss/_common.scss */
.preloader .preloader-img {
  position: absolute;
  top: 50%;
  z-index: 200;
  left: 0;
  right: 0;
  margin: 0 auto;
  text-align: center;
  display: inline-block;
  -webkit-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
  padding-top: 6px;
  -webkit-transition: .6s;
  -o-transition: .6s;
  transition: .6s;
}

/* line 643, ../../SAIFUL/Running_project/250 eCommerce_HTML/250 eCommerce_HTML/250 eCommerce_HTML/assets/scss/_common.scss */
.preloader .preloader-img img {
  max-width: 55px;
}

/* line 646, ../../SAIFUL/Running_project/250 eCommerce_HTML/250 eCommerce_HTML/250 eCommerce_HTML/assets/scss/_common.scss */
.preloader .pere-text strong {
  font-weight: 800;
  color: #dca73a;
  text-transform: uppercase;
}

@-webkit-keyframes zoom {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
    -webkit-transition: .6s;
    -o-transition: .6s;
    transition: .6s;
  }
  100% {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
    -webkit-transition: .6s;
    -o-transition: .6s;
    transition: .6s;
  }
}

@keyframes zoom {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
    -webkit-transition: .6s;
    -o-transition: .6s;
    transition: .6s;
  }
  100% {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
    -webkit-transition: .6s;
    -o-transition: .6s;
    transition: .6s;
  }
}
  </style>

    </head>
  <body>
    <!-- Preloader Start -->
    <!-- <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo.png" alt="">
                </div>
            </div>
        </div>
    </div> -->
    <!-- Preloader Start -->
    <!-- Header -->
    <header id="header">
      <!-- Nav -->
      <div id="nav">
        <!-- Main Nav -->
        <div id="nav-fixed">
          <div class="container">
            <!-- logo -->
            <div class="nav-logo">
              <a href="index" class="logo"><img src="./assets/img/logo.png" alt=""></a>
            </div>
            <!-- /logo -->

            <!-- nav -->
            <ul class="nav-menu nav navbar-nav">
              <?php
              $Category = new category();
              $categories = $Category->getAllCategory();
              debugger($categories,true);
              $Product = new product();
              if($categories){
                foreach ($categories as $key => $category) {
                $products = $Product->getAllProductByCategoryWithLimit($category->id,0,5);
              ?>
                <li class="has-children <?php echo CAT_COLOR[$category->id%4] ?>"><a href="category?id=<?php echo $category->id ?>"><?php echo $category->categoryname?></a>
                  <ul class="dropdown arrow-top">
              <?php
                  foreach ($products as $key => $product) {
               ?>
                  <li><a href="product?id=<?php echo $product->id ?>"><?php echo $product->productname ?></a></li>
               <?php   
                  }
              ?>
                  </ul>
              </li>
              <?php 
                }
              }
              ?>
              
            </ul>
            <!-- /nav -->

            <!-- search & aside toggle -->
            <div class="nav-btns">
              <button class="aside-btn"><i class="fa fa-bars"></i></button>
              <button class="search-btn"><i class="fa fa-search"></i></button>
              <div class="search-form">
                <input class="search-input" type="text" name="search" placeholder="Enter Your Search ...">
                <button class="search-close"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /search & aside toggle -->
          </div>
        </div>
        <!-- /Main Nav -->

        <!-- Aside Nav -->
        <div id="nav-aside">
          <!-- nav -->
          <div class="section-row">
            <ul class="nav-aside-menu">
              <li><a href="index.html">Home</a></li>
              <li><a href="about.html">About Us</a></li>
              <li><a href="#">Join Us</a></li>
              <li><a href="#">Advertisement</a></li>
              <li><a href="contact.html">Contacts</a></li>
            </ul>
          </div>
          <!-- /nav -->

          <!-- widget posts -->
          <div class="section-row">
            <h3>Recent Posts</h3>
            <div class="post post-widget">
              <a class="post-img" href="blog-post.html"><img src="./assets/img/widget-2.jpg" alt=""></a>
              <div class="post-body">
                <h3 class="post-title"><a href="blog-post.html">Pagedraw UI Builder Turns Your Website Design Mockup Into Code Automatically</a></h3>
              </div>
            </div>

            <div class="post post-widget">
              <a class="post-img" href="blog-post.html"><img src="./assets/img/widget-3.jpg" alt=""></a>
              <div class="post-body">
                <h3 class="post-title"><a href="blog-post.html">Why Node.js Is The Coolest Kid On The Backend Development Block!</a></h3>
              </div>
            </div>

            <div class="post post-widget">
              <a class="post-img" href="blog-post.html"><img src="./assets/img/widget-4.jpg" alt=""></a>
              <div class="post-body">
                <h3 class="post-title"><a href="blog-post.html">Tell-A-Tool: Guide To Web Design And Development Tools</a></h3>
              </div>
            </div>
          </div>
          <!-- /widget posts -->

          <!-- social links -->
          <div class="section-row">
            <h3>Follow us</h3>
            <ul class="nav-aside-social">
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
              <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
            </ul>
          </div>
          <!-- /social links -->

          <!-- aside nav close -->
          <button class="nav-aside-close"><i class="fa fa-times"></i></button>
          <!-- /aside nav close -->
        </div>
        <!-- Aside Nav -->
      </div>
      <!-- /Nav -->
      <?php
        if (in_array(pathinfo($_SERVER['PHP_SELF'],PATHINFO_FILENAME),BREADCRUMBS)){
      ?>
      <!-- Page Header -->
      <div class="page-header">
        <div class="container">
          <div class="row">
            <div class="col-md-10">
              <ul class="page-header-breadcrumb">
                <li><a href="index">Home</a></li>
                <li><?php echo (isset($bread) && !empty($bread))?$bread:"" ?></li>
              </ul>
              <h1><?php echo (isset($bread) && !empty($bread))?$bread:"" ?></h1>
            </div>
          </div>
        </div>
      </div>
      <!-- /Page Header -->
      <?php
        } 
      ?>
      <a id="gototop"  href="#"><i class="fa fa-arrow-up"></i></a>
    </header>
    <!-- /Header -->

