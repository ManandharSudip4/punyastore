<?php
	function debugger($data,$is_die=false){
		echo "<pre>";
		print_r($data);
		echo "<pre>";
		if ($is_die) {
			exit();
		}
	}
	debugger($_POST);
	$n = $_POST['star'];
	echo "$n";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ratings</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
	body{
		margin: 0;
		padding: 0;
		background: green;
	}
	.starss{
		display: block;
		top: 50%;
		left: 50%;
	}
	.before{
		display: block;
		content: '\f005';
		font-family: fontAwesome;
		position: absolute;
		font-size: 50px;
		color: #101010;
		top:0;
	}
	.after{
		display: block;
		content: '\f005';
		font-family: fontAwesome;
		position: absolute;
		font-size: 50px;
		color: #fd4;
		top: 0;
		text-shadow: 0 5px 5px rgba(0,0,0,.5);
	}

</style>
</head>
<body>
		<div class="starss">
				<div class="before" >
					<?php 
						for ($i=0; $i < 5; $i++) { 
					?>
							<label class="fa fa-star"></label>
					<?php	
						}
					?>
				</div>
				<div class="after" >
					<?php 
						for ($i=0; $i < $n; $i++) { 
					?>
							<label class="fa fa-star"></label>
					<?php	
						}
					?>
				</div>
				
	</div>
	<!-- section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							<!-- post -->
							<div class="col-md-4">
								<div class="post">
									<a class="post-img" href="blog-post.html"><img src="./assets/img/post-1.jpg" alt=""></a>
									<div class="post-body">
										<div class="post-meta col-md-12" style="align-content: center;text-align: center;padding-right: 0px;padding-left: 0px;">
											<a class="post-category cat-2 col-md" href="#">Name</a>
											<span class="post-category cat-2 col-md">Disc</span>
											<span class="post-category cat-2 col-md">Price</span>
										</div>
										<h3 class="post-title" style="align-content: center; text-align: center;"><a href="blog-post.html">Javascript : Prototype vs Class</a></h3>
									</div>
								</div>
							</div>
							<!-- /post -->
							<!-- post -->
							<div class="col-md-4">
								<div class="post">
									<a class="post-img" href="blog-post.html"><img src="./assets/img/post-1.jpg" alt=""></a>
									<div class="post-body">
										<div class="post-meta col-md-12" style="align-content: center;text-align: center;padding-right: 0px;padding-left: 0px;">
											<a class="post-category cat-2 col-md" href="#">Name</a>
											<span class="post-category cat-2 col-md">Disc</span>
											<span class="post-category cat-2 col-md">Price</span>
										</div>
										<h3 class="post-title" style="align-content: center; text-align: center;"><a href="blog-post.html">Javascript : Prototype vs Class</a></h3>
									</div>
								</div>
							</div>
							<!-- /post -->
										
							<!-- post -->
							<div class="col-md-4">
								<div class="post">
									<a class="post-img" href="blog-post.html"><img src="./assets/img/post-1.jpg" alt=""></a>
									<div class="post-body">
										<div class="post-meta col-md-12" style="align-content: center;text-align: center;padding-right: 0px;padding-left: 0px;">
											<a class="post-category cat-2 col-md" href="#">Name</a>
											<span class="post-category cat-2 col-md">Disc</span>
											<span class="post-category cat-2 col-md">Price</span>
										</div>
										<h3 class="post-title" style="align-content: center; text-align: center;"><a href="blog-post.html">Javascript : Prototype vs Class</a></h3>
									</div>
								</div>
							</div>
							<!-- /post -->

							<!-- post -->
							<div class="col-md-4">
								<div class="post">
									<a class="post-img" href="blog-post.html"><img src="./assets/img/post-1.jpg" alt=""></a>
									<div class="post-body">
										<div class="post-meta col-md-12" style="align-content: center;text-align: center;padding-right: 0px;padding-left: 0px;">
											<a class="post-category cat-2 col-md" href="#">Name</a>
											<span class="post-category cat-2 col-md">Disc</span>
											<span class="post-category cat-2 col-md">Price</span>
										</div>
										<h3 class="post-title" style="align-content: center; text-align: center;"><a href="blog-post.html">Javascript : Prototype vs Class</a></h3>
									</div>
								</div>
							</div>
							<!-- /post -->
							<!-- post -->
							<div class="col-md-4">
								<div class="post">
									<a class="post-img" href="blog-post.html"><img src="./assets/img/post-1.jpg" alt=""></a>
									<div class="post-body">
										<div class="post-meta col-md-12" style="align-content: center;text-align: center;padding-right: 0px;padding-left: 0px;">
											<a class="post-category cat-2 col-md" href="#">Name</a>
											<span class="post-category cat-2 col-md">Disc</span>
											<span class="post-category cat-2 col-md">Price</span>
										</div>
										
										<h3 class="post-title" style="align-content: center; text-align: center;"><a href="blog-post.html">Javascript : Prototype vs Class</a></h3>
									</div>
								</div>
							</div>
							<!-- /post -->
							<!-- post -->
							<div class="col-md-4">
								<div class="post">
									<a class="post-img" href="blog-post.html"><img src="./assets/img/post-1.jpg" alt=""></a>
									<div class="post-body">
										<div class="post-meta col-md-12" style="align-content: center;text-align: center;padding-right: 0px;padding-left: 0px;">
											<a class="post-category cat-2 col-md" href="#">Name</a>
											<span class="post-category cat-2 col-md">Disc</span>
											<span class="post-category cat-2 col-md">Price</span>
										</div>
										<h3 class="post-title" style="align-content: center; text-align: center;"><a href="blog-post.html">Javascript : Prototype vs Class</a></h3>
									</div>
								</div>
							</div>
							<!-- /post -->
							
							<div class="clearfix visible-md visible-lg"></div>
							
							<!-- ad -->
							<div class="col-md-12">
								<div class="section-row">
									<a href="#">
										<img class="img-responsive center-block" src="./img/ad-2.jpg" alt="">
									</a>
								</div>
							</div>
							<!-- ad -->
							
						</div>
					</div>
					
				</div>
				<!-- /row -->
				<!-- row2 -->
				<div class="row">
					<div class="col-md-8">
						<div class="row">
							<!-- post -->
							<div class="col-md-6">
								<div class="post ">
									<a class="post-img" href="blog-post.html"><img src="./assets/img/post-1.jpg" alt=""></a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category cat-2" href="#">JavaScript</a>
											<span class="post-date">March 27, 2018</span>
										</div>
										<h3 class="post-title"><a href="blog-post.html">Javascript : Prototype vs Class</a></h3>
									</div>
								</div>
							</div>
							<!-- /post -->
							<!-- post -->
							<div class="col-md-6">
								<div class="post ">
									<a class="post-img" href="blog-post.html"><img src="./assets/img/post-1.jpg" alt=""></a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category cat-2" href="#">JavaScript</a>
											<span class="post-date">March 27, 2018</span>
										</div>
										<h3 class="post-title"><a href="blog-post.html">Javascript : Prototype vs Class</a></h3>
									</div>
								</div>
							</div>
							<!-- /post -->
							<!-- post -->
							<div class="col-md-6">
								<div class="post ">
									<a class="post-img" href="blog-post.html"><img src="./assets/img/post-1.jpg" alt=""></a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category cat-2" href="#">JavaScript</a>
											<span class="post-date">March 27, 2018</span>
										</div>
										<h3 class="post-title"><a href="blog-post.html">Javascript : Prototype vs Class</a></h3>
									</div>
								</div>
							</div>
							<!-- /post -->
							<!-- post -->
							<div class="col-md-6">
								<div class="post ">
									<a class="post-img" href="blog-post.html"><img src="./assets/img/post-1.jpg" alt=""></a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category cat-2" href="#">JavaScript</a>
											<span class="post-date">March 27, 2018</span>
										</div>
										<h3 class="post-title"><a href="blog-post.html">Javascript : Prototype vs Class</a></h3>
									</div>
								</div>
							</div>
							<!-- /post -->
										
							<!-- post -->
							<div class="col-md-6">
								<div class="post">
									<a class="post-img" href="blog-post.html"><img src="./assets/img/post-4.jpg" alt=""></a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category cat-2" href="#">JavaScript</a>
											<span class="post-date">March 27, 2018</span>
										</div>
										<h3 class="post-title"><a href="blog-post.html">Chrome Extension Protects Against JavaScript-Based CPU Side-Channel Attacks</a></h3>
									</div>
								</div>
							</div>
							<!-- /post -->

							<!-- post -->
							<div class="col-md-6">
								<div class="post">
									<a class="post-img" href="blog-post.html"><img src="./assets/img/post-6.jpg" alt=""></a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category cat-2" href="#">JavaScript</a>
											<span class="post-date">March 27, 2018</span>
										</div>
										<h3 class="post-title"><a href="blog-post.html">Why Node.js Is The Coolest Kid On The Backend Development Block!</a></h3>
									</div>
								</div>
							</div>
							<!-- /post -->
							
							<div class="clearfix visible-md visible-lg"></div>
							
							<!-- ad -->
							<div class="col-md-12">
								<div class="section-row">
									<a href="#">
										<img class="img-responsive center-block" src="./img/ad-2.jpg" alt="">
									</a>
								</div>
							</div>
							<!-- ad -->
							
							<!-- post -->
							<div class="col-md-12">
								<div class="post post-row">
									<a class="post-img" href="blog-post.html"><img src="./assets/img/post-2.jpg" alt=""></a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category cat-2" href="#">JavaScript</a>
											<span class="post-date">March 27, 2018</span>
										</div>
										<h3 class="post-title"><a href="blog-post.html">Ask HN: Does Anybody Still Use JQuery?</a></h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
									</div>
								</div>
							</div>
							<!-- /post -->
							
							<!-- post -->
							<div class="col-md-12">
								<div class="post post-row">
									<a class="post-img" href="blog-post.html"><img src="./assets/img/post-5.jpg" alt=""></a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category cat-2" href="#">JavaScript</a>
											<span class="post-date">March 27, 2018</span>
										</div>
										<h3 class="post-title"><a href="blog-post.html">Microsoft’s TypeScript Fills A Long-standing Void In JavaScript</a></h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
									</div>
								</div>
							</div>
							<!-- /post -->

							<!-- post -->
							<div class="col-md-12">
								<div class="post post-row">
									<a class="post-img" href="blog-post.html"><img src="./assets/img/post-3.jpg" alt=""></a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category cat-2" href="#">JavaScript</a>
											<span class="post-date">March 27, 2018</span>
										</div>
										<h3 class="post-title"><a href="blog-post.html">Javascript : Prototype vs Class</a></h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
									</div>
								</div>
							</div>
							<!-- /post -->
							
							<!-- post -->
							<div class="col-md-12">
								<div class="post post-row">
									<a class="post-img" href="blog-post.html"><img src="./assets/img/post-1.jpg" alt=""></a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category cat-2" href="#">JavaScript</a>
											<span class="post-date">March 27, 2018</span>
										</div>
										<h3 class="post-title"><a href="blog-post.html">Why Node.js Is The Coolest Kid On The Backend Development Block!</a></h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
									</div>
								</div>
							</div>
							<!-- /post -->
							
							<div class="col-md-12">
								<div class="section-row">
									<button class="primary-button center-block">Load More</button>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<!-- ad -->
						<!-- <div class="aside-widget text-center">
							<a href="#" style="display: inline-block;margin: auto;">
								<img class="img-responsive" src="./img/ad-1.jpg" alt="">
							</a>
						</div> -->
						<!-- /ad -->
						
						<!-- post widget -->
						<!-- <div class="aside-widget">
							<div class="section-title">
								<h2>Most Read</h2>
							</div>

							<div class="post post-widget">
								<a class="post-img" href="blog-post.html"><img src="./assets/img/widget-1.jpg" alt=""></a>
								<div class="post-body">
									<h3 class="post-title"><a href="blog-post.html">Tell-A-Tool: Guide To Web Design And Development Tools</a></h3>
								</div>
							</div>

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
						</div> -->
						<!-- /post widget -->
						
						<!-- catagories -->
						<div class="aside-widget">
							<div class="section-title">
								<h2>Catagories</h2>
							</div>
							<div class="category-widget">
								<ul>
									<li><a href="#" class="cat-1">Web Design<span>340</span></a></li>
									<li><a href="#" class="cat-2">JavaScript<span>74</span></a></li>
									<li><a href="#" class="cat-4">JQuery<span>41</span></a></li>
									<li><a href="#" class="cat-3">CSS<span>35</span></a></li>
								</ul>
							</div>
						</div>
						<!-- /catagories -->
						
						<!-- tags -->
						<div class="aside-widget">
							<div class="tags-widget">
								<ul>
									<li><a href="#">Chrome</a></li>
									<li><a href="#">CSS</a></li>
									<li><a href="#">Tutorial</a></li>
									<li><a href="#">Backend</a></li>
									<li><a href="#">JQuery</a></li>
									<li><a href="#">Design</a></li>
									<li><a href="#">Development</a></li>
									<li><a href="#">JavaScript</a></li>
									<li><a href="#">Website</a></li>
								</ul>
							</div>
						</div>
						<!-- /tags -->
						
						<!-- archive -->
						<div class="aside-widget">
							<div class="section-title">
								<h2>Archive</h2>
							</div>
							<div class="archive-widget">
								<ul>
									<li><a href="#">Jan 2018</a></li>
									<li><a href="#">Feb 2018</a></li>
									<li><a href="#">Mar 2018</a></li>
								</ul>
							</div>
						</div>
						<!-- /archive -->
					</div>
				</div>
				<!-- /row2 -->
			</div>
			<!-- /container -->
		</div>
		<!-- /section -->
</body>
</html>
