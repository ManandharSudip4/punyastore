
<?php 
	include $_SERVER['DOCUMENT_ROOT'].'config/init.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>test heart button</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css" type="text/css">
<style type="text/css">
	.button{
		margin-left: 50%;
		margin-top: 20%;
		background-color: transparent;
		border-color: transparent;
		height: 50px;
		width: 50px; 
		font-size: 50px; 
	}
	.cbutton{
		margin-left: 50%;
		margin-top: 20%;
		background-color: transparent;
		border-color: transparent;
		height: 50px;
		width: 50px; 
		font-size: 50px; 
	}
	.cbutton i{
		color: blue;
	}
/*	.cbutton i:hover{
		color: blue;
	}*/
	.button i{
		color: red;
	}
	.button i:hover{
		color: blue;
	}
</style>    
</head>
<body>
	<button class="button" id="button" onclick="toggle()"><i class="fa fa-heart"></i></button>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
	$('#button').click(function(){
		$('#button').removeClass('button').addClass('cbutton');
	});
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>