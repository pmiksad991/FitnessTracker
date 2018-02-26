<?php

//radi provjere
	$_POST["ime"]=trim($_POST["ime"]);
	if(strlen($_POST["ime"])==0){
		$poruke["ime"]="Ime obavezno";
	}
	if(strlen($_POST["ime"])>50){
		$poruke["ime"]="Dužina imena mora biti manja od 50";
	}
	$_POST["prezime"]=trim($_POST["prezime"]);
	if(strlen($_POST["prezime"])==0){
		$poruke["prezime"]="Prezime obavezno";
	}
	if(strlen($_POST["prezime"])>50){
		$poruke["prezime"]="Dužina prezimena mora biti manja od 50";
	}
	$_POST["username"]=trim($_POST["username"]);
	if(strlen($_POST["username"])==0){
		$poruke["username"]="Korisničko ime obavezno";
	}
	
	$_POST["pass"]=trim($_POST["pass"]);
	if(strlen($_POST["pass"])==0){
		$poruke["pass"]="Šifra obavezno";
	}
	if(strlen($_POST["pass"])<6){
		$poruke["pass"]="Dužina šifre mora biti veća od 6";
	}
	
	$_POST["mail"]=trim($_POST["mail"]);
	if(strlen($_POST["mail"])==0){
		$poruke["mail"]="E-mail obavezan";
	}
