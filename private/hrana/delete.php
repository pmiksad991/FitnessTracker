<?php

include_once '../../config.php';
if(!isset($_SESSION["connected"])){
	header("location: ../../logout.php");
	exit;
}
if(!isset($_GET["id"])){
	header("location: ../../logout.php");
	exit;
}
if(isset($_GET["id"])){
	if(!is_numeric($_GET["id"])){
	header("location: ../../logout.php");
	exit;
}
}
$id=$_GET["id"];

$stmt=$conn->prepare("delete from hrana 
		where id=:id");
		$stmt->execute(array("id"=>$id));
		header("location: obrok.php");