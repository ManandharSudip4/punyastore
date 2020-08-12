<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>quantity</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:700%7CNunito:300,600" rel="stylesheet"> 

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="../assets/css/bootstrap.min.css"/>

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="../assets/css/style.css"/>
    <style type="text/css">
    	.quan{
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%,-50%);
		display: flex;
	}
    </style>
</head>
<body>
	<div class="quan ">
		<?php $t=120; ?>
		<span>Rate = Rs <?php echo $t; ?></span> 
		<input type="number" id="quanr" name="quantity" value = 1 onchange="newnew()">
		<button class="btn btn-success" style="margin-right: 5px; margin-left: 5px" onclick="newnew()">ok</button> 
		<div><span id="heyhey"> Rs <?php echo $t; ?> </span></div>
	</div>
</body>
		<!-- <script src="../assets/js/jquery.min.js"></script>
		<script src="../assets/js/bootstrap.min.js"></script>
		<script src="../assets/js/main.js"></script> -->
<script type="text/javascript">
	function newnew() {
		var price = <?php echo $t; ?>;
		var abc = document.getElementById("quanr").value;
		if (abc >=1){
		var total = price * abc;
		document.querySelector('#heyhey').textContent = total; 
		console.log(total);
	}
	}
</script>
</html>