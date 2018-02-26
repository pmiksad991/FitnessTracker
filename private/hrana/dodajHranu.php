<?php

include_once '../../config.php';

if(!isset($_SESSION["connected"])){
	header("location: ../../logout.php");
}
if(!isset($_GET["datum"])){
	header("location: ../../logout.php");
}
$uvjet="";
		if(isset($_GET["uvjet"])){
			$uvjet="%" . $_GET["uvjet"] . "%";
		}else{
			$uvjet="%";
		}
$vrijemeDanas=$_GET["datum"];
$id=$_SESSION["connected"][0]->id;
?>
<!DOCTYPE html>
<html>
	<head>
		<?php include_once "../../template/head.php"; ?>
		<link rel="stylesheet" href="<?php echo $locAPP ?>css/jquery-ui.css">
		<script src="<?php echo $locAPP ?>js/jquery-ui.js"></script>
	</head>
	<body>
		<?php include_once "../../template/header.php"; ?>
		<section class="container">
			<div class="row">
			<div class="col-sm-2"></div>
			<div class="col-sm-8"><h1><img src="<?php echo $locAPP; ?>img/Gym.ico">FITNESSTRACKER</h1></div>
			<div class="col-sm-2"></div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="row">
						<div class="col-md-10">
							<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="GET">
								<input value="<?php echo str_replace("%","", $uvjet); ?>" type="text" name="uvjet" class="form-control" placeholder="Unesite naziv..." id="uvjet">
								<input type="hidden" name="datum" value="<?php echo $vrijemeDanas ?>">
								</div>
								<div class="col-md-2">
									<button type="button submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Traži</button>
							</form>
								</div>
				
				</div>
			</div>
			<hr>
			<div class="row">
			<div class="col-sm-2"></div>
			<div class="col-sm-4">
				<div class="panel panel-default" id="scrollable">
  					<div class="panel-body">
  					<?php 
  						$stmt = $conn -> prepare("select naziv, kalorije, id from hrana where naziv like :uvjet order by naziv asc;");
						$stmt -> execute(array("uvjet" => $uvjet));
						$rezultat = $stmt->fetchAll(PDO::FETCH_OBJ);
  					?>
  					<ul id="panelhrana">
  					<?php
  					if($uvjet!="%"){
  					foreach ($rezultat as $red) { 
  					?>
  					<li id="a<?php echo $red->id ?>"><button type="button" class="btn btn-default"><?php echo $red->naziv ?><br>Kalorija na 100g: <?php echo $red->kalorije ?></button></li>
  					<?php }} ?>
  					</ul>
  					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="panel panel-default">
  					<div class="panel-body" id="refreshcilj">
  					</div>
				</div>
			</div>
			<div class="col-sm-2"></div>
			</div>

		</section>
		<section class="container">
			<div class="col-sm-1"></div>
			<div class="col-sm-10">


		</section>
		<?php include_once "../../template/footer.php"; ?>
	</body>
	<script>
		$(document).ready(function () {
     $(".btn").on("click", function () {
     	var sifra = ($(this).parent().attr('id'));
     	var datum = "<?php echo $vrijemeDanas; ?>";
        $("#refreshcilj").load("hranadiv.php?sifra="+sifra+"&datum="+datum);

     });
});
	</script>
</html>
