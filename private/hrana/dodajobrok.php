<?php
include_once '../../config.php';
if(!isset($_SESSION["connected"])){
	header("location: ../../logout.php");
	exit;
}
if(!isset($_POST["id"])){
	header("location: ../../logout.php");
	exit;
}
if(isset($_POST["dodajhran"])){
$idkorisnika=$_SESSION["connected"][0]->id;
$idhrane=$_POST["id"];
$datum=$_POST["datum"];
$tezina=$_POST["tezina"];

$stmt=$conn->prepare("select count(id) as ukupno, id from obrok where id_korisnika=:idkorisnika and vrijeme=:datum");
$stmt->execute(array("idkorisnika" => $idkorisnika, "datum" => $datum));
$result = $stmt->fetchAll(PDO::FETCH_OBJ);
$idobroka=$result[0]->id;
if($result[0]->ukupno==0){

	$stmt=$conn->prepare("insert into obrok(id_korisnika, vrijeme) values (:id, :datum)");
	$stmt->execute(array("id"=>$idkorisnika, "datum"=>$datum));
	$stmt=$conn->prepare("select id from obrok where id_korisnika=:idkorisnika and vrijeme=:datum");
	$stmt->execute(array("idkorisnika" => $idkorisnika, "datum" => $datum));
	$result = $stmt->fetchAll(PDO::FETCH_OBJ);
	echo $idobroka;
	$stmt2=$conn->prepare("insert into obrok_hrana(id_obroka, id_hrane, tezina) values (:id_obroka, :id_hrane, :tezina)");
	$stmt2->execute(array("id_obroka"=>$idobroka, "id_hrane"=>$idhrane, "tezina"=>$tezina));
	header("location: unosobroka.php?datum=".$datum);
}else{
	$stmt3=$conn->prepare("insert into obrok_hrana(id_obroka, id_hrane, tezina) values (:id_obroka, :id_hrane, :tezina)");
	$stmt3->execute(array("id_obroka"=>$idobroka, "id_hrane"=>$idhrane, "tezina"=>$tezina));
	header("location: unosobroka.php?datum=".$datum);
}
}