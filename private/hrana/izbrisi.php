<?php

include_once '../../config.php';
if(!isset($_SESSION["connected"])){
	header("location: ../../logout.php");
	exit;
}
if(!isset($_GET["obrok"])&&!isset($_GET["hrana"])){
	header("location: ../../logout.php");
	exit;
}
if(isset($_GET["hrana"])){
	if(!is_numeric($_GET["hrana"])){
	header("location: ../../logout.php");
	exit;
}
}
if(isset($_GET["obrok"])){
	if(!is_numeric($_GET["obrok"])){
	header("location: ../../logout.php");
	exit;
}
}
$id_hrane=$_GET["hrana"];
$id_obroka=$_GET["obrok"];
$vrijemeDanas=$_GET["danas"];

$stmt=$conn->prepare("delete from obrok_hrana where id_hrane=:id_hrane and id_obroka=:id_obroka");
$stmt->execute(array("id_hrane"=>$id_hrane, "id_obroka"=>$id_obroka));
header("location: unosobroka.php?datum=".$vrijemeDanas);