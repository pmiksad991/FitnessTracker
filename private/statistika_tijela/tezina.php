<?php

include_once '../../config.php';

if(!isset($_SESSION["connected"])){
	header("location: ../../logout.php");
}

?>
<!DOCTYPE html>
<html>
	<head>
		<?php include_once "../../template/head.php"; ?>
	</head>
	<body>
		<?php include_once "../../template/header.php"; ?>
		<section class="container">
			<div class="col-sm-2"></div>
			<div class="col-sm-8"><h1><img src="<?php echo $locAPP; ?>img/Gym.ico">FITNESSTRACKER</h1></div>
			<div class="col-sm-2"></div>
		</section>
		<section class="container">
			<div class="col-sm-3"></div>
			<div class="col-sm-6">
				<?php include_once "../../template/navbar.php"; ?>
				<div id="statistika">
				<script src="https://code.highcharts.com/highcharts.js"></script>
				<script src="https://code.highcharts.com/modules/exporting.js"></script>

				<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto;"></div>
				<?php include_once 'chart_tezina.php'; ?>
				</div>
				<div id="unesi">
					<a href="unos.php" class="btn btn-primary">Uesi nove podatke</a>
				</div>
			</div>
			<div class="col-sm-3"></div>
		</section>
		<?php include_once "../../template/footer.php"; ?>
	</body>
</html>