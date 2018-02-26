<?php

include_once 'config.php';

if(isset($_POST["connect"])){
	$stmt=$conn->prepare("select * from korisnik where username=:username and pass=:pass");
	$stmt->bindValue(":username",$_POST["username"]);
	$stmt->bindValue(":pass",$_POST["password"]);
	$stmt->execute();
	$res = $stmt->fetchAll(PDO::FETCH_OBJ);
	foreach ($res as $red) {
		if($_POST["username"]===$red->username && $_POST["password"]===$red->pass){
			$_SESSION["connected"]=$res;
		header("location: private/index.php");
		exit;
		}
	}
	if($res==null){
		header("location: index.php");
	}
	}else{
		header("location: index.php");
	}