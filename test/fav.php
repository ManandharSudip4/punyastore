<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:700%7CNunito:300,600" rel="stylesheet"> 

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="assets/css/bootstrap.min.css"/>

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="font-awesome.min.css">
	<style type="text/css">
		.rating{
          transform:rotateY(180deg);
     }
     .rating input{
          display: none;
     }
     .rating label{
          display:inline-block;
          cursor: pointer;
          width: 50px;
     }
     .rating label:before{
          content: '\f08a';
          font-family: fontAwesome;
          position: relative;
          display: block;
          font-size: 50px;
          color: #101010;
     }
     
     .rating label:after{
          content: '\f004';
          font-family: fontAwesome;
          position: absolute;
          display: block;
          font-size: 50px;
          color: #fd4;
          top: 0;
          opacity: 0;
          transition: .2s;
          text-shadow: 0 5px 5px rgba(0,0,0,.5);
     }
     .rating label:hover:after,
     .rating input:hover ~ label:after,
     .rating input:checked ~ label:after{
          opacity: 1;
     }
	</style>
</head>
<body>
	<form class="post-reply" method="post" action="process/ratings">
									<!-- <div class="stars col-md-6">
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
									</div> -->
									<div class="stars col-md-6">
											<div class="rating form-group" style="width: 270px;">
												<input type="radio" name="star" class="star star-5" id="star-5" value="5" required="required">
												<label for="star-5" class="star star-5" ></label>
											</div>
									</div>
										<!-- <input type="hidden" name="product_id" value=<?php echo($product_info->categoryid); ?> > -->
								<button class="primary-button" type="Submit" style="left: 50%">Submit</button>
								</div>
							</form>
</body>
</html>