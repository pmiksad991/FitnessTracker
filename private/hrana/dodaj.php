<?php

include_once '../../config.php';

if(!isset($_SESSION["connected"])){
	header("location: ../../logout.php");
}
include_once "../../template/inputPolja.php";
$poruke=array();
if(isset($_POST["dodaj"])){
	include_once 'check.php';
	
	if(count($poruke)==0){
	$stmt=$conn->prepare("insert into hrana (id, naziv, kalorije, masti, zas_masti, kolesterol, natrij, ugljikohidrati, secer, protein) values 
		(null, :naziv, :kalorije, :masti, :zas_masti, :kolesterol, :natrij, :ugljikohidrati, :secer, :protein)");
	$stmt->execute(array(
		"naziv"=>$_POST["naziv"],
		"kalorije"=>$_POST["kalorije"],
		"masti"=>$_POST["masti"],
		"zas_masti"=>$_POST["zas_masti"],
		"kolesterol"=>$_POST["kolesterol"],
		"natrij"=>$_POST["natrij"],
		"ugljikohidrati"=>$_POST["ugljikohidrati"],
		"secer"=>$_POST["Šećer"],
		"protein"=>$_POST["protein"]
		));
		header("location: obrok.php");
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
				<div class="alert alert-info" role="alert">Unesite vrijednosti na 100g</div>
				<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
					<?php
				inputPolje("text","naziv",$poruke,"");
				inputPolje("number","kalorije",$poruke,"kcal");
				inputPolje("number","masti",$poruke,"g");
				?>
				<div class="input-group">
  					<span class="input-group-addon">Zasićene Masne Kiseline</span>
				  <input class="form-control" 
				  <?php 
				  if(isset($_POST["zas_masti"])):
				  	?>
				  	value="<?php echo $_POST["zas_masti"] ?>"
				  	<?php
				  endif;
				   ?>
				   type="number" id="zas_masti" name="zas_masti" aria-describedby="zas_mastiPomoc">
				   <span class="input-group-addon">g</span>
				  </div>
  				
				<?php if (isset($poruke["zas_masti"])): ?>
				<div class="alert alert-danger" role="alert"><p id="zas_mastiPomoc"><?php echo $poruke["zas_masti"]; ?></p></div>
				<?php endif; echo "<br>";
				inputPolje("number","kolesterol",$poruke,"mg");
				inputPolje("number","natrij",$poruke,"mg");
				inputPolje("number","ugljikohidrati",$poruke,"g");
				inputPolje("number","Šećer",$poruke,"g");
				inputPolje("number","protein",$poruke,"g");
				 ?>
				<div class="row" style="text-align: center;">
				<button type="button submit" class="btn btn-primary" name="dodaj">Spremi</button>
				</form>
				<a href="obrok.php" class="btn btn-danger">Odustani</a>
				</div>
				</div>	
			<div class="col-sm-3"></div>
		</section>
		<script>
			<?php 
			if(!isset($_POST["dodaj"])){
				?>
				$("#naziv").focus();
				<?php
			}else{
				foreach ($poruke as $key => $value) {
					?>
					$("#<?php echo $key ?>").focus();
					<?php
					break;
				}
				?>
				
				<?php
			}
			?>
		</script>
		<?php include_once "../../template/footer.php"; ?>
	</body>
</html>
