<?php

include_once '../config.php';

if(!isset($_SESSION["connected"])){
	header("location: ../logout.php");
}

			$stmt=$conn->prepare("select * from korisnik");
			$stmt->execute();
			$result = $stmt->fetchAll(PDO::FETCH_OBJ);

			$stmt1=$conn->prepare("select * from hrana");
			$stmt1->execute();
			$result1 = $stmt1->fetchAll(PDO::FETCH_OBJ);

			$stmt2=$conn->prepare("select * from obrok");
			$stmt2->execute();
			$result2 = $stmt2->fetchAll(PDO::FETCH_OBJ);

			$stmt3=$conn->prepare("select * from cilj");
			$stmt3->execute();
			$result3 = $stmt3->fetchAll(PDO::FETCH_OBJ);

			$stmt4=$conn->prepare("select * from statistika_tijela");
			$stmt4->execute();
			$result4 = $stmt4->fetchAll(PDO::FETCH_OBJ);
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
			<div class="col-sm-8"><img src="../img/logo.png"><img src="../img/home.png"></div>
			<div class="col-sm-2"></div>
		</section>
		<section class="container">
			<div class="col-sm-3"></div>
			<div class="col-sm-6">
					<table>
						<tr>
							<th>ID</th>
							<th>Ime</th>
							<th>Prezime</th>
							<th>Datum rođenja</th>
							<th>Spol</th>
							<th>Username</th>
							<th>Password</th>
							<th>E-mail</th>
						</tr>
						<?php
						foreach ($result as $red) {
							echo "<tr><td>".$red->id."</td><td>".$red->ime."</td><td>".$red->prezime."</td><td>".$red->datum_rodenja."</td><td>".$red->spol."</td><td>".$red->username."</td><td>".$red->pass."</td><td>".$red->email."</td></tr>";
						}
						?>
						</table>

						<table>
						<tr>
							<th>ID</th>
							<th>naziv</th>
							<th>kalorije</th>
							<th>masti</th>
							<th>Zasićene masne kiseline</th>
							<th>kolesterol</th>
							<th>natrij</th>
							<th>ugljikohidrati</th>
							<th>Šećer</th>
							<th>Protein</th>
						</tr>
						<?php
						foreach ($result1 as $red) {
							echo "<tr><td>".$red->id."</td><td>".$red->naziv."</td><td>".$red->kalorije."</td><td>".$red->masti."</td><td>".$red->zas_masti."</td><td>".$red->kolesterol."</td><td>".$red->natrij."</td><td>".$red->ugljikohidrati."</td><td>".$red->secer."</td><td>".$red->protein."</td></tr>";
						}
						?>
						</table>
			</div>
			<div class="col-sm-3"></div>
		</section>
	</body>
	<?php include_once "../template/footer.php"; ?>
</html>