<?php

include_once '../../config.php';

if(!isset($_SESSION["connected"])){
	header("location: ../../logout.php");
}
if(!isset($_GET["datum"])){
	$vrijemeDanas= date('Y-m-d');
	$vrijemeDanas2="'".$vrijemeDanas."%'";
	$originaldan=substr($vrijemeDanas, 8, 10);
}else{
	$originalDatum=date('Y-m-d');
	$vrijemeDanas= $_GET["datum"];
	$vrijemeDanas2="'".$vrijemeDanas."%'";
	$originaldan=substr($originalDatum, 8, 10);
}
$id=$_SESSION["connected"][0]->id;

$stmt=$conn->prepare("select hrana.naziv as naziv, hrana.kalorije as kalorije, hrana.masti as masti, hrana.zas_masti as zas_masti, hrana.kolesterol as kolesterol, hrana.natrij as natrij, hrana.ugljikohidrati as ugljikohidrati, hrana.secer as secer, hrana.protein as protein, obrok.vrijeme as vrijeme, obrok_hrana.tezina as tezina, obrok_hrana.id_obroka as id_obroka, obrok_hrana.id_hrane as id_hrane from obrok_hrana
inner join obrok on obrok.id=obrok_hrana.id_obroka 
inner join hrana on obrok_hrana.id_hrane = hrana.id where obrok.id_korisnika=".$id." and obrok.vrijeme like ".$vrijemeDanas2);
$stmt->execute();
$rezultat = $stmt->fetchAll(PDO::FETCH_OBJ);

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
			<div class="col-sm-12"><hr></div>
		</section>
		<section class="container">
			<div class="col-sm-1"></div>
			<div class="col-sm-10">
				<?php 
				$mjesecgodina=substr($vrijemeDanas, 0, -2);
				$dan=substr($vrijemeDanas, 8, 10);
				$mjesec=substr($vrijemeDanas, 5, -3);
				switch ($mjesec){
					case "01":
						$mjesecnaziv="Siječanj";
						break;
					case "02":
						$mjesecnaziv="Veljača";
						break;
					case "03":
						$mjesecnaziv="Ožujak";
						break;
					case "04":
						$mjesecnaziv="Travanj";
						break;
					case "05":
						$mjesecnaziv="Svibanj";
						break;
					case "06":
						$mjesecnaziv="Lipanj";
						break;
					case "07":
						$mjesecnaziv="Srpanj";
						break;
					case "08":
						$mjesecnaziv="Kolovoz";
						break;
					case "09":
						$mjesecnaziv="Rujan";
						break;
					case "10":
						$mjesecnaziv="Listopad";
						break;
					case "11":
						$mjesecnaziv="Studeni";
						break;
					case "12":
						$mjesecnaziv="Prosinac";
						break;

				}
				$godina=substr($vrijemeDanas, 0, 4);
				if($dan==10){
					$prije="0".($dan-1);
					$poslije=$dan+1;
				}else if($dan==9){
					$prije="0".($dan-1);
					$poslije=$dan+1;
				}else if($dan<9){
					$prije="0".($dan-1);
					$poslije="0".($dan+1);
				}else{
					$prije=$dan-1;
					$poslije=$dan+1;
				}
				?>
				<div class="row">
				<h3>Vaš unos za: </h3>
				<table id="table3">
					<?php if($dan!="01"): ?>
						<td><a href="unosobroka.php?datum=<?php echo $mjesecgodina.$prije ?>"><span class="glyphicon glyphicon-chevron-left"></span></a></td>
					<?php else: ?>
					<?php endif; ?>
					<td id="td3"><?php echo $dan.".".$mjesecnaziv.".".$godina; ?></td>
					<?php if($dan<$originaldan): ?>
						<td><a href="unosobroka.php?datum=<?php echo $mjesecgodina.$poslije ?>"><span class="glyphicon glyphicon-chevron-right"></span></a></td>
					<?php else: ?>
					<?php endif; ?>
				</table>
				</div>	
				<?php if(isset($rezultat[0]->naziv)){ ?>
				<hr>
					<div id="hrana">
						<table>
							<thead>
							<tr>
								<th>Naziv</th>
								<th id="td2">Količina, g</th>
								<th>Kalorije, kcal</th>
								<th id="td2">Ugljikohidrati, g</th>
								<th>Masti, g</th>
								<th id="td2">Protein, g</th>
								<th>Natrij, mg</th>
								<th id="td2">Šećer, g</th>
								<th><th>

							</tr>
							</thead>
							<tbody id="podaci">
							<?php
							foreach ($rezultat as $red) {
								?>
								<tr>
									<td><?php echo $red->naziv; ?></td>
									<td id="td2"><?php echo $red->tezina; ?></td>
									<td><?php echo ($red->kalorije*$red->tezina); ?></td>
									<td id="td2"><?php echo ($red->ugljikohidrati*$red->tezina); ?></td>
									<td><?php echo ($red->masti*$red->tezina); ?></td>
									<td id="td2"><?php echo ($red->protein*$red->tezina); ?></td>
									<td><?php echo ($red->natrij*$red->tezina); ?></td>
									<td id="td2"><?php echo ($red->secer*$red->tezina); ?></td>
									<td><a href="izbrisi.php?obrok=<?php echo $red->id_obroka; ?>&hrana=<?php echo $red->id_hrane; ?>&danas=<?php echo $vrijemeDanas; ?>">Izbriši</a></td>
								</tr>
								<?php
							}
							?>
						</tbody>
						</table>
						<?php
						}else{echo "<h3>Nisu postavljeni obroci za ovaj dan</h3>";} 
						?>
						<br>
						<a type="button" class="btn btn-primary" href="dodajHranu.php?datum=<?php echo $vrijemeDanas; ?>">Dodaj Hranu</a>
						<?php
						$stmt=$conn->prepare("select sum(kalorije*oh.tezina) as kalorije, sum(masti*oh.tezina) as masti, sum(zas_masti*oh.tezina) as zas_masti, sum(kolesterol*oh.tezina) as kolesterol, sum(natrij*oh.tezina) as natrij, sum(ugljikohidrati*oh.tezina) as ugljikohidrati, sum(secer*oh.tezina) as secer, sum(protein*oh.tezina) as protein, sum(oh.tezina) from hrana as h
inner join obrok_hrana as oh on oh.id_hrane=h.id
inner join obrok as o on o.id=oh.id_obroka where o.id_korisnika=".$id." and o.vrijeme like ".$vrijemeDanas2."; ");
$stmt->execute();
$dnevnevrijednosti = $stmt->fetch(PDO::FETCH_OBJ);
include_once "progress.php";
include_once "funkcije.php";
						?>
						<h3>Dnevne vrijednosti:</h3>
						<div class="row">
							<div class="col-lg-6">
								<?php progressBar("Kalorije, kcal", $dnevnevrijednosti->kalorije, $BMR) ?>
							</div>
							<div class="col-lg-6">
								<?php progressBar("Masti, g", $dnevnevrijednosti->masti, $totalmasti) ?>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<?php progressBar("Zasićene masne kiseline, g",$dnevnevrijednosti->zas_masti ,$totalzas_masti ) ?>
							</div>
							<div class="col-lg-6">
								<?php progressBar("Kolesterol, mg", $dnevnevrijednosti->kolesterol, $totalkolesterol) ?>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<?php progressBar("Natrij, mg", $dnevnevrijednosti->natrij, $totalnatrij) ?>
							</div>
							<div class="col-lg-6">
								<?php progressBar("Ugljikohidrati, g", $dnevnevrijednosti->ugljikohidrati, $totalugljikohidrati) ?>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<?php progressBar("Šećer, g", $dnevnevrijednosti->secer, $totalsecer) ?>
							</div>
							<div class="col-lg-6">
								<?php progressBar("Protein, g", $dnevnevrijednosti->protein, $totalprotein) ?>
							</div>
						</div>	
					</div>
				

		</section>
		<?php include_once "../../template/footer.php"; ?>
	</body>
</html>
