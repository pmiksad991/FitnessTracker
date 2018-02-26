<?php
include_once '../../config.php';
if(!isset($_SESSION["connected"])){
	header("location: ../../logout.php");
	exit;
}
	$izraz = $conn->prepare("select id, naziv from hrana where naziv like :uvjet order by naziv asc limit 10");
	$izraz->execute(array("uvjet" => "%" . $_GET["term"] . "%"));
	$rezultati=$izraz->fetchAll(PDO::FETCH_OBJ);
	$t=new stdClass();
	$t->id=0;
	$t->naziv="Nisu prikazani svi rezultati, filtrirajte dodatnim unosom";
	$rezultati[]=$t;
	echo json_encode($rezultati);