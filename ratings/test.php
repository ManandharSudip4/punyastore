<?php include $_SERVER['DOCUMENT_ROOT'].'config/init.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ratings</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
	body{
		margin: 0;
		padding: 0;
		/*background: #262626;*/
	}
	.stars{
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%,-50%);
		display: flex;
	}
	.rating{
		transform:rotateY(180deg);
	}
	.review label{
		width: 50px;
		font-size: 30px;
		align-items:center;
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
		content: '\f005';
		font-family: fontAwesome;
		position: relative;
		display: block;
		font-size: 50px;
		color: #101010;
	}
	.rating label:after{
		content: '\f005';
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
<style type="text/css">
	@charset "UTF-8";
:root {
  --star-size: 50px;
  --star-color: #fff;
  --star-background: #fd4;
}

.Starss {
  --percent: calc(var(--rate) / 5 * 100%);
  display: inline-block;
  font-size: var(--star-size);
  font-family: Times;
  line-height: 1;
}
.Starss::before {
  content: '★★★★★';
  letter-spacing: 3px;
  background: linear-gradient(90deg, var(--star-background) var(--percent), var(--star-color) var(--percent));
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}


</style>
</head>
<body>
	<div>
		<?php 
			$Rating = new rating();
			$ratings = $Rating->getAllRating();
			//debugger($ratings);
			?>
	</div>
	<?php foreach ($ratings as $key => $rating) {
	?>
	<div>
		<?php 
			$abc = $rating->rating;
		if(!empty($abc)){
			for ($i=0; $i <$abc ; $i++) {
		?> 		<i class="fa fa-star" style="color:#fd4">  </i>
		<?php
			}
			$bc = 5- $abc;
			if($bc>0){
				for ($i=0; $i < $bc ; $i++) { 
		?>
					<i class="fa fa-star" style="color:#101010">  </i>
		<?php
				}
			}
		}
		?>
	</div>
	<?php
	} ?>

	<?php
		  $count = 0;
		 $rates = $Rating->getRatingbyId(2);
		 //debugger($rates);
		  $aa=0;
		 foreach ($rates as $key => $rate) {
		  	$aa += $rate->rating;
		  	$count = $count + 1;
		  }
		  $bb=($aa/$count);
		 
	?>
		<div class="Starss" style="--rate:<?php echo $bb ?>;" aria-label="Rating of this product is 2.3 out of 5.">		
		<div class="stars">
			<form action="../process/ratings" method="post" style="color: white">
				<div class="form-group" >
					<span>Name *</span>
					<input type="text" name="name" required="required" class="form-control">
				</div>
				<div class="form-group">
					<span>Email *</span>
					<input type="email" name="email" required="required" class="form-control">
				</div>
				<div class="rating" >
					<input type="radio" name="star" class="star star-5" id="star-5" value="5" required="required">
					<label for="star-5" class="star star-5" ></label>
					<input type="radio" name="star" class="star star-4" id="star-4" value="4" >
					<label for="star-4" class="star star-4" ></label>
					<input type="radio" name="star" class="star star-3" id="star-3" value="3">
					<label for="star-3" class="star star-3" ></label>
					<input type="radio" name="star" class="star star-2" id="star-2" value="2">
					<label for="star-2" class="star star-2" ></label>
					<input type="radio" name="star" class="star star-1" id="star-1" value="1">
					<label for="star-1" class="star star-1" ></label>
				</div>
				<div class="form-group">
					<textarea class="form-control" name="review" placeholder="Review"></textarea>
				</div>
				<div>
					<input type="hidden" name="productid"  value="<?php echo(2) ?>">
				</div>
				<div align="center"><button class="btn btn-success" type="submit">Submit</button></div>
			</form>
	</div>

</body>
<!-- <script type="text/javascript">
	function fun(n){
		console.log(n);
	}
</script> -->
</html>