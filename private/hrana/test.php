<?php
include_once '../../config.php';
if(!isset($_SESSION["connected"])){
	header("location: ../../logout.php");
	exit;
}

	$id_korisnika=$_SESSION["connected"][0]->id;

	$izraz = $conn->prepare("select id, vrijeme from obrok where id_korisnika=".$id_korisnika." order by vrijeme desc limit 1");
	$izraz->execute();
	$rezultati=$izraz->fetch(PDO::FETCH_OBJ);
	
	$datum_baza=$rezultati->vrijeme;
	
	$today = $datum_baza = date("Y-m-d", strtotime("now"));
	if ($datum_baza == $today)
	{
     $msg="Jednaki";
	} else {
     $msg="Nisu jednaki";
	}
	
	echo $msg;