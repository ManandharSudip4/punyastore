<?php
	include $_SERVER['DOCUMENT_ROOT'].'config/init.php';
	$bread = 'Product';
	if (isset($_GET['id']) && !empty($_GET['id'])) {
		$product_id = (int)$_GET['id'];
		if($product_id){
			$Product = new product();
			$product_info = $Product->getProductbyId($product_id);
			if ($product_info) {
				$product_info = $product_info[0];
				//debugger($product_info);
				$bread = $product_info->productname ;
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
	// $header = $product_info->category;
	include 'inc/header.php';
?>

		<!-- section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row-1">
					<!-- Post content -->	
					<div class="col-md-6">
						<div class="section-row sticky-container">
							<div class="main-post">
								<?php  
									$Rating = new rating();
									$count_rating = 0;
									$rates = $Rating->getRatingbyId($product_info->categoryid);
									//debugger($rates);
									$sum_of_ratings = 0;
									if(!empty($rates)){
										foreach ($rates as $key => $rate) {
									  		$sum_of_ratings += $rate->rating;
									  		$count_rating += 1;
									  	}
									$average_rating=($sum_of_ratings/$count_rating);
									}
										// debugger($product_info, true);
									  //echo $average_rating;
									if (isset($product_info->image) && !empty($product_info->image) && file_exists(UPLOAD_PATH.'product/'.$product_info->image)) {
										$thumbnail = UPLOAD_URL.'product/'.$product_info->image;
									}else{
										$thumbnail = UPLOAD_URL.'noimg.png';
									}
								?>
								<div class="post post-thumb" style="margin-bottom: 0px;">
									<div class="mySlides">
									  <div class="numbertext">1 / 3</div>
									  <img src="<?php echo $thumbnail ?>" style="height:320px">
									  <div class="text">Caption Text</div>
									</div>
									<div class="mySlides">
									  <div class="numbertext">2 / 3</div>
									  <img src="../assets/img/post-3.jpg" style="height:320px">
									  <div class="text">Caption Two</div>
									</div>
									<div class="mySlides">
									  <div class="numbertext">3 / 3</div>
									  <img src="../assets/img/post-4.jpg" style="height:320px">
									  <div class="text">Caption Three</div>
									</div>
								<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
								<a class="next" onclick="plusSlides(1)">&#10095;</a>
								</div>
								<br><div class="Starss" style="--rate:<?php echo isset($average_rating)?$average_rating:0; ?>; align-content: center;" aria-label="Rating of this product is 2.3 out of 5."></div>
								<div style="text-align:center">
								  <span class="dot" onclick="currentSlide(1)"></span> 
								  <span class="dot" onclick="currentSlide(2)"></span> 
								  <span class="dot" onclick="currentSlide(3)"></span> 
								</div>
							</div>
						</div>
					</div>
					<!-- /Post content -->
					<!-- aside -->
					<div class="col-md-6">
						<!-- post widget -->
						<div class="aside-widget">	
							<div class="section-title" style="text-align: center; margin-bottom: 0px">
								<h3><?php echo $product_info->productname ?></h3>
							</div>
							<div class="col-md-6">
								<span ><h6><a style="cursor: pointer;" href="#comments">3 Reviews</a> | <a style="cursor: pointer;" href="#comments">21 Answered Questions </a></h6></span>
								<span><h5 style="font-style: italic;">Only 2 left in stock, Order Soon</h5></span>
								<ul>
									<li><h5 style="margin-bottom: 0px; margin-top: 5px;">Made of : <?php echo $product_info->madeof ?></h5></li>
									<li><h5 style="margin-bottom: 0px; margin-top: 5px;">Size : <?php echo $product_info->size ?></h5></li>
									<li><h5 style="margin-bottom: 0px; margin-top: 5px;">Weight : <?php echo $product_info->weight ?> g</h5></li>
									<li><h5 style="margin-bottom: 0px; margin-top: 5px;">Previous Price : Rs  <?php echo $product_info->cprice ?></h5></li>
									<li><h5 style="margin-bottom: 0px; margin-top: 5px;">Present Price : Rs <?php echo $product_info->acprice; ?></h5></li>						
								</ul>
							</div>
							<div class="col-md-6" >
								<div class="aside-widget text-center">
									<form action="" method="post" style="margin-bottom: 5px">																
										<label for="quantity"> Quantity : </label> <input type="number" id="quantity" name="quantity" min="1" value = "1" onchange="newnew()" style="width: 50px"><br>										
										<button class="btn btn-warning" style="margin-top: 5px; margin-bottom: 5px; width: 100px text-center" onclick="newnew()">Buy Now</button>
										<button class="btn btn-success" style="margin-top: 5px; margin-bottom: 5px; width: 100px text-center" onclick="newnew()">Add to List <span class="fa fa-shopping-cart"></span></button>
									</form>
									<!-- <div><span id="total">Total: Rs <?php // echo $t; ?> </span></div> -->
									<!-- info -->
										<ul>
											<li><h4 style="margin-bottom: 0px">Delivery Option</h4></li>
											<li><h5 style="margin-bottom: 0px; margin-top: 2px;">Inside KTM Valley only</h5></li>
											<li><h5 style="margin-bottom: 0px; margin-top: 2px;">Charge : Rs. 50</h5></li>
											<li><h5 style="margin-bottom: 0px; margin-top: 2px;">Cash on Delivery</h5></li>
										</ul>
									
									<!-- /info -->
								</div>	
							</div>
							<div class="col-md-8" id="ReplySection">
								<h4 style="margin-bottom: 0px; margin-top:20px">Any Query?</h4>	
								<form class="post-reply" method="post" action="process/query" style="margin-top: 0px">
									<div class="row">
										<div class="form-group">
											<span>Name *</span>
											<input class="input" type="text" name="name" required="required">
										</div>
										<div class="form-group">
											<textarea class="input" name="query" placeholder="query"></textarea>
										</div>
										<input type="hidden" name="queryid" id="query" value="">
										<input type="hidden" name="productid" value="<?php echo($product_id) ;?>">
										<button class="primary-button" type="Submit">Submit</button>
									</div>
								</form>
							</div>
							<div class="col-md-4">
								<!-- ad -->
								<div class="aside-widget text-center">
									<a href="#" style="display: inline-block;margin: auto;">
										<img class="img-responsive" src="./assets/img/ad-1.jpg" alt="">
									</a>
								</div>
								<!-- /ad -->
							</div>								
						</div>
						<!-- /post widget -->
					</div>
					<!-- /aside -->
				</div>
				<!-- /row -->
				<div class="clearfix visible-md visible-lg"></div>
				<!-- row -->
				<div class="row-2">
					<!-- Post content -->
					<div class="col-md-6">
						<!-- author -->
						<div class="section-row">
							<div class="post-author">
								<div class="media">
									<div class="media-body">
										<div class="media-heading">
											<h3>Description</h3>
										</div>
										<p><?php echo html_entity_decode($product_info->description); ?></p>
									</div>
								</div>
							</div>
						</div>
						<!-- /author -->
						<!-- ad -->
						<div class="section-row text-center">
							<a href="#" style="display: inline-block;margin: auto;">
								<img class="img-responsive" src="./assets/img/ad-2.jpg" alt="">
							</a>
						</div>
						<!-- ad -->
					</div>
					<div class="col-md-6">
						<!-- post widget -->
						<div class="aside-widget">
							<div class="section-title">
								<h2 style="text-align: center;">Similar Items</h2>
							</div>
							<div class="col-md-4">
							<!-- ad -->
							<div class="section-row text-center">
								<a href="#" style="display: inline-block;margin: auto;">
									<img class="img-responsive" src="./assets/img/ad-1.jpg" alt="">
								</a>
							</div>
							<!-- ad -->
							</div>
							<div class="col-md-4">
							<!-- ad -->
							<div class="section-row text-center">
								<a href="#" style="display: inline-block;margin: auto;">
									<img class="img-responsive" src="./assets/img/ad-1.jpg" alt="">
								</a>
							</div>
							<!-- ad -->
							</div>
							<div class="col-md-4">
							<!-- ad -->
							<div class="section-row text-center">
								<a href="#" style="display: inline-block;margin: auto;">
									<img class="img-responsive" src="./assets/img/ad-1.jpg" alt="">
								</a>
							</div>
							<!-- ad -->
							</div>

						</div>
						<!-- /post widget -->
					</div>
					<div class="clearfix visible-md visible-lg"></div>
					<div class="col-md-6">
						<!-- reply -->
						<div class="section-row">
							<div class="section-title">
								<h2>Leave a Review</h2>
								<p>your email address will not be published. required fields are marked *</p>
							</div>
							<form class="post-reply" method="post" action="process/ratings">
								<div class="row" style="text-align: center;">
									<div class="col-md-6">
										<div class="form-group">
											<span>Name *</span>
											<input class="input" type="text" name="name" required="required" max="15">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<span>Email *</span>
											<input class="input" type="email" name="email" required="required">
										</div>
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
									<div class="col-md-6">
										<div class="form-group">
											<textarea class="input" name="review" placeholder="Review"></textarea>
										</div>
									</div>
										<input type="hidden" name="product_id" value=<?php echo($product_info->categoryid); ?> >
								<button class="primary-button" type="Submit" style="left: 50%">Submit</button>
								</div>
							</form>
						</div>
						<!-- /reply -->
					</div>
					<!-- categories -->
					<div class="col-md-6">
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
					</div>
					<!-- /categories -->
					<!-- /Post content -->
					<div class="clearfix visible-md visible-lg"></div>
					<!-- aside -->
					<div class="col-md-3">
						<div class="section-row">
							<div class="section-title">

								<h3><?php
								$Rating = new rating();
								 $counts = $Rating->getNumberRatingByProduct($product_id);
									//debugger($counts,true);
									echo $counts[0]->total; 
								 ?> Reviews</h3>
							</div>
									<?php 
										$Rating = new rating();
										$ratings = $Rating->getAllRatingById($product_id);

										//debugger($ratings);
										foreach ($ratings as $key => $rating) {
									?>	
							<div class="post-comments" id="comments" style="font-size: 10px">
								<!-- comment -->
								<div class="media">
									<div class="media-left">
										<img class="media-object" src="./assets/img/avatar.png" style="width:  20px; height: 30px">
									</div>
									<div class="media-body"  style="font-size: 13px">
										<div class="media-heading" style="margin-bottom: 0px;">
											<h4 style="margin-bottom: 0px"><?php echo $rating->name;?></h4>
											<div style="float: left; display: inline-block; padding-right: 5px ">
												<?php 
														$abc = $rating->rating;
													if(!empty($abc)){
														for ($i=0; $i <$abc ; $i++) {
													?> 		<i class="fa fa-star" style="color:#fd4; font-size: 13px">  </i>
													<?php
														}
														$bc = 5 - $abc;
														if($bc>0){
															for ($i=0; $i < $bc ; $i++) { 
													?>
																<i class="fa fa-star" style="color:#101010; font-size: 13px">  </i>
													<?php
															}
														}
													}
													?>
											</div>
											<div style="font-size:12px; margin-top: 0px; margin-bottom: 0px; color: #a7b3c6"><?php echo date("M d, Y ",strtotime($rating->created_date)) ;?></div>
											<!-- <a href="#" class="reply">Reply</a> -->
										</div>
										<div class="reviews" style="margin-top: 0px;"><p style="padding: 10px"><?php echo $rating->review ?></p></div>
									</div>
								</div>
								<!-- /comment -->

							</div>
							<br>
							<?php
							}
						?>
						</div>
					</div>

					<div class="col-md-6">	
						<div class="section-row">
							<div class="section-title">
								<h3>
									<?php
									$Query = new query();
									$Count=$Query->getNumberQueryByProduct($product_id);
									echo $Count[0]->total; 
									?>
									Query
								</h3>
							</div>

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
										<img class="media-object" src="./assets/img/avatar.png" alt="">
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
												<img class="media-object" src="./assets/img/avatar.png" alt="">
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
						</div>
					
					</div>

					<div class="col-md-3">
						<div class="section-title text-center">
							<!-- archive -->
							<div class="aside-widget">
								<div class="section-title">
									<h2>Archive</h2>
								</div>
								<div class="archive-widget">
									<ul>
										<li><a href="#">January 2018</a></li>
										<li><a href="#">Febuary 2018</a></li>
										<li><a href="#">March 2018</a></li>
									</ul>
								</div>
							</div>
							<!-- /archive -->
						</div>
					</div>
					<!-- /aside -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /section -->

<?php include 'inc/footer.php'; ?>
<script type="text/javascript">
	
	function reply(element){
		console.log(element);
		var queryid = $(element).data('queryid');
		console.log(queryid);
		$('#query').val(queryid);
	}
</script>