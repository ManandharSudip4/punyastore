<?php 
	include $_SERVER['DOCUMENT_ROOT'].'config/init.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>test heart button</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/elegant-icons.css" type="text/css"> 
    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/style.css" type="text/css">
<style type="text/css">
	.btn-1{
		margin-left: 50%; 
		background-color: transparent; 
		border-color: transparent; 
    font-size: 50px;
    width: 200px; 
	}


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
		<button id="button" class="btn-1" type="submit" onclick="toggle()">
       <div class="stars col-md-6">
            <div class="rating form-group" style="width: 270px;">
		          <input type="hidden" name="abc" id="acval" value="1">
              <input type="radio" name="star" class="star star-5" id="star-5" value="5" required="required">
              <label for="star-5"></label>
            </div>
        </div>
		</button>
    <!-- <button class="btn-1" style="size: 100px"><div class="rating form-group" style="width: 270px;">
              <input type="hidden" name="abc" id="acval" value="1">
              <input type="radio" name="star" class="star star-5" id="star-5" value="5" required="required">
              <label for="star-5"></label>
            </div></button> -->	
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript">

    // const whiteHeart = '\u2661';
    // const blackHeart = '\u2665';
    // const button = document.querySelector('button');
    // button.addEventListener('click', toggles);

    // function toggles() {
    //   const like = button.textContent;
    //   if(like==blackHeart) {
    //     button.textContent = whiteHeart;
    //   } else {
    //     button.textContent = blackHeart;
    //   }
    // }

    function toggle(){
        var abc = $('#acval').val();
        console.log(abc);
    $.ajax({
      url:"heartbuttonprocess.php",
      type: "POST",
      data: {abcs:abc},
      success:function(data,status){  
      }
    });
    }

</script>