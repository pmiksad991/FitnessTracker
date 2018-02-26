<?php

include_once '../config.php';
if(!isset($_SESSION["connected"])){
	header("location: ../logout.php");
}
$osoba=$_SESSION["connected"][0];
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
		<section class="container" id="center">
			<div class="col-sm-3"></div>
			<div class="col-sm-6" id="ostalo">
				<h3>Dobrodošli <?php echo $osoba->ime." ".$osoba->prezime; ?></h3>

				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris facilisis purus quis sem sagittis rhoncus. Curabitur euismod eget mi nec elementum. Integer id elit ac mi viverra auctor. Fusce porta, tellus sed accumsan luctus, libero sem aliquam risus, ultrices mollis augue diam eu sapien. Nam a dolor et purus egestas ornare sed quis orci. Nunc suscipit mauris eget velit finibus, eu dictum dolor euismod. Nulla facilisi. Fusce id imperdiet risus. Donec ornare lobortis tincidunt. Praesent laoreet ipsum urna, nec lacinia ligula efficitur id.</p>
				<div class="btn-group btn-group-lg" role="group">
					<button onclick="window.location.href='cilj/cilj.php'" type="button" class="btn btn-default">Izaberi Cilj</button>
					<button onclick="window.location.href='statistika_tijela/unos.php'" type="button" class="btn btn-default">Stanje tijela</button>
					<button onclick="window.location.href='hrana/unosobroka.php'" type="button" class="btn btn-default">Unos obroka</button>
				</div>

			</div>
			<div class="col-sm-3"></div>
		</section>
		<?php include_once "../template/footer.php"; ?>
	</body>
</html>