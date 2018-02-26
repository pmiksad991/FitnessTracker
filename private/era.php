<?php

include_once '../config.php';
if(!isset($_SESSION["connected"])){
	header("location: ../logout.php");
}
?>
<!DOCTYPE html>
<html>
	<head>
		<?php include_once "../template/head.php"; ?>
	</head>
	<body>
		<?php include_once "../template/header.php"; ?>
		<section class="container">
			<div class="col-sm-2"></div>
			<div class="col-sm-8"><h1><img src="<?php echo $locAPP; ?>img/Gym.ico">FITNESSTRACKER</h1></div>
			<div class="col-sm-2"></div>
		</section>
		<section class="container">
			<div class="col-sm-12" id="era">
					<img src="../img/era.png">
			</div>
		</section>
	</body>
	<?php include_once "../template/footer.php"; ?>
</html>