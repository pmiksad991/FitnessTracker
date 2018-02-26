<?php

//radi provjere
	$_POST["visina"]=trim($_POST["visina"]);
	if(strlen($_POST["visina"])==0){
		$poruke["visina"]="Visina obavezna";
	}
	if(!is_numeric($_POST["visina"])){
		$poruke["visina"]="Visina mora biti brojčana vrijednost";
	}
		$_POST["tezina"]=trim($_POST["tezina"]);
	if(strlen($_POST["tezina"])==0){
		$poruke["tezina"]="Težina obavezna";
	}
	if(!is_numeric($_POST["tezina"])){
		$poruke["tezina"]="Težina mora biti brojčana vrijednost";
	}
	if(!is_numeric($_POST["postotak_masti"])){
		$poruke["postotak_masti"]="Postotak masti mora biti brojčana vrijednost";
	}
	

