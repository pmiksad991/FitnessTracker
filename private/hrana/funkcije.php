<?php


$stmt=$conn->prepare("select spol, DAY(datum_rodenja) as dan, MONTH(datum_rodenja) as mjesec, YEAR(datum_rodenja) as godina  from korisnik where id=".$id);
$stmt->execute();
$korisnik = $stmt->fetch(PDO::FETCH_OBJ);

$stmt=$conn->prepare("select visina, tezina from statistika_tijela where id_korisnika=".$id." order by datum desc limit 1");
$stmt->execute();
$statistika = $stmt->fetch(PDO::FETCH_OBJ);

  $age = (date("md", date("U", mktime(0, 0, 0, $korisnik->mjesec, $korisnik->dan, $korisnik->godina))) > date("md")
    ? ((date("Y") - $korisnik->godina) - 1)
    : (date("Y") - $korisnik->godina));
$BMR=0;
if($korisnik->spol=="M"){
	$BMR = 66.47 + (13.75*$statistika->tezina) + (5.0*$statistika->visina) - (6.75*$age);
	$totalsecer=37.5;
}
if($korisnik->spol=="Ž"){
	$BMR = 665.09 + (9.56*$statistika->tezina) + (1.84*$statistika->visina) - (4.67*$age);
	$totalsecer=25;
}
$temp=$BMR/2000;
$totalmasti=round(64.71*$temp, 1, PHP_ROUND_HALF_UP);
$totalzas_masti=round(20.25*$temp, 1, PHP_ROUND_HALF_UP);
$totalkolesterol=round(299*$temp, 1, PHP_ROUND_HALF_UP);
$totalnatrij=round(2353*$temp, 1, PHP_ROUND_HALF_UP);
$totalugljikohidrati=round(301.5*$temp, 1, PHP_ROUND_HALF_UP);
$totalprotein=round(50*$temp, 1, PHP_ROUND_HALF_UP);




?>