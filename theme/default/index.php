<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $rsblog['title'];?> - <?php echo $rsblog['sitename'];?></title>
	<link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo $rsblog['theme'];?>/style.css">
</head>
<body>

<div class="container">
	<h1><?php echo $rsblog['title'];?></h1>
	<hr>
    <?php echo $rsblog['content'];?>
</div>

</body>
</html>