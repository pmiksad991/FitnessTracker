<?php

//radi provjere
	$_POST["naziv"]=trim($_POST["naziv"]);
	if(strlen($_POST["naziv"])==0){
		$poruke["naziv"]="Naziv obavezan";
	}
	if(strlen($_POST["naziv"])>50){
		$poruke["naziv"]="Dužina naziva mora biti manja od 50";
	}
	$_POST["kalorije"]=trim($_POST["kalorije"]);
	if(strlen($_POST["kalorije"])==0){
		$poruke["kalorije"]="kalorije obavezne";
	}
	if(!is_numeric($_POST["kalorije"])){
		$poruke["kalorije"]="Sadržaj kalorija mora biti brojčana vrijednost";
	}
		$_POST["masti"]=trim($_POST["masti"]);
	if(strlen($_POST["masti"])==0){
		$poruke["masti"]="masti obavezne";
	}
	if(!is_numeric($_POST["masti"])){
		$poruke["masti"]="Sadržaj masti mora biti brojčana vrijednost";
	}
		$_POST["zas_masti"]=trim($_POST["zas_masti"]);
	if(strlen($_POST["zas_masti"])==0){
		$poruke["zas_masti"]="Zasićene masne kiseline obavezne";
	}
	if(!is_numeric($_POST["zas_masti"])){
		$poruke["zas_masti"]="Sadržaj zasićenih masnih kiselina mora biti brojčana vrijednost";
	}
		$_POST["kolesterol"]=trim($_POST["kolesterol"]);
	if(strlen($_POST["kolesterol"])==0){
		$poruke["kolesterol"]="kolesterol obavezan";
	}
	if(!is_numeric($_POST["kolesterol"])){
		$poruke["kolesterol"]="Sadržaj kolesterola mora biti brojčana vrijednost";
	}

		$_POST["natrij"]=trim($_POST["natrij"]);
	if(strlen($_POST["natrij"])==0){
		$poruke["natrij"]="natrij obavezan";
	}
	if(!is_numeric($_POST["natrij"])){
		$poruke["natrij"]="Sadržaj natrija mora biti brojčana vrijednost";
	}

		$_POST["ugljikohidrati"]=trim($_POST["ugljikohidrati"]);
	if(strlen($_POST["ugljikohidrati"])==0){
		$poruke["ugljikohidrati"]="ugljikohidrati obavezni";
	}
	if(!is_numeric($_POST["ugljikohidrati"])){
		$poruke["ugljikohidrati"]="Sadržaj ugljikohidrata mora biti brojčana vrijednost";
	}
		$_POST["Šećer"]=trim($_POST["Šećer"]);
	if(strlen($_POST["Šećer"])==0){
		$poruke["Šećer"]="Šećer obavezne";
	}
	if(!is_numeric($_POST["Šećer"])){
		$poruke["Šećer"]="Sadržaj šećera mora biti brojčana vrijednost";
	}
		$_POST["protein"]=trim($_POST["protein"]);
	if(strlen($_POST["protein"])==0){
		$poruke["protein"]="protein obavezne";
	}
	if(!is_numeric($_POST["protein"])){
		$poruke["protein"]="Sadržaj proteina mora biti brojčana vrijednost";
	}

