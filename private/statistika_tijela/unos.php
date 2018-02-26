<?php

include_once '../../config.php';

if(!isset($_SESSION["connected"])){
	header("location: ../../logout.php");
}
$id=$_SESSION["connected"][0]->id;
$stmt=$conn->prepare("select visina, tezina, postotak_masti from statistika_tijela where id_korisnika=".$id." order by datum desc limit 1");
$stmt->execute();
/*$_POST=$stmt->fetch(PDO::FETCH_OBJ);*/
$proba=$stmt->fetch(PDO::FETCH_OBJ);
$_POST["visina"]=$proba->visina;
$_POST["tezina"]=$proba->tezina;
$_POST["postotak_masti"]=$proba->postotak_masti;
$poruke=array();
include_once "../../template/inputPolja.php";

if(isset($_POST["unesi"])){
	include_once 'check.php';
	
	if(count($poruke)==0){
	$stmt=$conn->prepare("insert into statistika_tijela (id, id_korisnika, visina, tezina, postotak_masti, datum) values 
		(null, :id_korisnika, :visina, :tezina, :postotak_masti, now())");
	$stmt->execute(array(
		"id_korisnika"=>$id,
		"visina"=>$_POST["visina"],
		"tezina"=>$_POST["tezina"],
		"postotak_masti"=>$_POST["postotak_masti"]
		));
		header("location: statistika.php");
}
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
			<div class="col-sm-6" id="ostalo">
					
					<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
						<?php
						inputPolje("number","visina",$poruke,"cm");
						inputPolje("number","tezina",$poruke,"kg");
						inputPolje("number","postotak_masti",$poruke,"%");
						?>
						<div class="row" id="unesi">
						<button type="button submit" class="btn btn-primary" name="unesi">Spremi</button>
					</form>
						<a href="statistika.php" class="btn btn-danger">Odustani</a>
						</div>
					
			</div>
			<div class="col-sm-3"></div>
		</section>
		<?php include_once "../../template/footer.php"; ?>
	</body>
</html>