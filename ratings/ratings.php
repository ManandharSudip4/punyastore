<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ratings</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
	.rating{
		width: 93%;
		max-width: 350px;
		text-align: center;
		margin: 4% auto;
		padding: 40px 0;
		background: #111;
		color: #eee;
		border-radius: 5px;
		border: 2px solid #444;
		overflow: hidden;
		margin-top: 25px;
	}

	div.stars{
		width: 270px;
		display: inline-block;
	}

	input.star{
		display: none;
	}

	label.star{
		float: right;
		padding: 10px;
		font-size: 36px;
		color: #444;
		transition: all 0.2s;
	}

	input.star ~ label.star:hover{
		background-color: #fd4;
	}

	input.star:checked ~ label.star:before{
		content: '\f005';
		color: #fd4;
		transition: all 0.2s;
	}

	input.star-5: checked ~ label.star:before{
		color: #fe7;
		text-shadow: 0 0 20px #952;
	}
	label.star:before{
		content: '\f006';
		font-family: FontAwesome;
	}
	input.star-1:checked ~ label.star:before{
		color: #f62;
	}

</style>
</head>
<body>
	<div class="rating">
		<div class="stars">
			<form action="">
				<input type="radio" name="star" class="star star-5" id="star-5" >
				<label for="star-5" class="star star-5" onclick="fun(5)"></label>
				<input type="radio" name="star" class="star star-4" id="star-4" onclick="fun(4)">
				<label for="star-4" class="star star-4"></label>
				<input type="radio" name="star" class="star star-3" id="star-3" onclick="fun(3)">
				<label for="star-3" class="star star-3"></label>
				<input type="radio" name="star" class="star star-2" id="star-2" onclick="fun(2)">
				<label for="star-2" class="star star-2"></label>
				<input type="radio" name="star" class="star star-1" id="star-1" onclick="fun(1)">
				<label for="star-1" class="star star-1"></label>
				<div>
					<label for="review">Review</label>
					<textarea type="text" name="review" cols="35px" rows="5px"></textarea>
				</div>
			</form>
		</div>
	</div>
</body>
<script type="text/javascript">
	
	function fun(a){
		console.log(a);
	}
</script>
</html>