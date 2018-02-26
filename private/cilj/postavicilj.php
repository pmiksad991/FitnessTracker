<?php
include_once '../../config.php';

if(isset($_POST["postavicilj"])){
	$date = $_POST['datum'];
	$your_date = date("Y-m-d", strtotime($date));
	$stmt=$conn->prepare("insert into cilj (id, id_korisnika, tezina_cilj, postotak_masti_cilj, datum_cilj, tezina_stanje, postotak_stanje) values 
		(null, :id_korisnika, :tezina, :postotak_masti, :datum, :tezina_stanje, :postotak_stanje)");
	$stmt->execute(array(
	  "id_korisnika"=>$_SESSION["connected"][0]->id,
	  "tezina"=>$_POST['tezina'],
	  "postotak_masti"=>$_POST['postotak_masti'],
	  "datum"=>$your_date,
	  "tezina_stanje"=>$_POST['tezina_stanje'],
	  "postotak_stanje"=>$_POST['postotak_stanje']
	  ));
	header("location: cilj.php");
	}else{
		header("location: cilj.php");
	}
?>