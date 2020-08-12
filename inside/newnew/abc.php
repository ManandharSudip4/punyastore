<!DOCTYPE html>
<html>
<head>
	<title></title>
<style type="text/css">
	@charset "UTF-8";
:root {
  --star-size: 60px;
  --star-color: #fff;
  --star-background: #fc0;
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

body {
  background: #eee;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

* {
  position: relative;
  box-sizing: border-box;
}
</style>
</head>
<body>
	<?php $s = 4.5 ?>
<div class="Starss" style="--rate:<?php echo $s ?>;" aria-label="Rating of this product is 2.3 out of 5.">
</body>
</html>