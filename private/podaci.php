<?php

include_once '../config.php';

if(!isset($_SESSION["connected"])){
	header("location: ../logout.php");
}

?>
<!DOCTYPE html>
<html>
	<head>
		<?php include_once "../template/head.php"; ?>
	</head>
	<body>
		<?php include_once "../template/header.php"; ?>
		<section class="container">
			<div class="col-sm-12">
<?php
$month=1;
echo "insert into statistika_tijela(id, id_korisnika, visina, tezina, postotak_masti, datum) values<br>";
for ($i=0; $i < 12; $i++) {
	if ($i==11) {
		echo "(null, 1, 176, ".(82.3-$i).", ".(18-$i).", '2016-".(01+$i)."-12'),<br>";
	echo "(null, 2, 182, ".(93.5-$i).", ".(16-$i).", '2016-".(01+$i)."-12'),<br>";
	echo "(null, 3, 165, ".(60-$i).", ".(14.2-$i).", '2016-".(01+$i)."-12'),<br>";
	echo "(null, 4, 170, ".(65.6-$i).", ".(16.3-$i).", '2016-".(01+$i)."-12');<br>";
	}else{
	echo "(null, 1, 176, ".(82.3-$i).", ".(18-$i).", '2016-".(01+$i)."-12'),<br>";
	echo "(null, 2, 182, ".(93.5-$i).", ".(16-$i).", '2016-".(01+$i)."-12'),<br>";
	echo "(null, 3, 165, ".(60-$i).", ".(14.2-$i).", '2016-".(01+$i)."-12'),<br>";
	echo "(null, 4, 170, ".(65.6-$i).", ".(16.3-$i).", '2016-".(01+$i)."-12'),<br>";
}
}
?>
<hr>
<?php
echo "insert into hrana(id, naziv, kalorije, masti, zas_masti, kolesterol, natrij, ugljikohidrati, secer, protein) values<br>";
for ($i=0; $i < 30; $i++) {
	if ($i==29) {
echo "(null, 'ab".(1+$i)."', ".(1+$i).", 0.".(1+$i).", 0.".(1+$i).", ".(6+$i).", ".(100+$i).", 2.".(1+$i).", 0.".(1+$i).", ".(1+$i).");<br>";
}else{
echo "(null, 'ab".(1+$i)."', ".(1+$i).", 0.".(1+$i).", 0.".(1+$i).", ".(6+$i).", ".(100+$i).", 2.".(1+$i).", 0.".(1+$i).", ".(1+$i)."),<br>";
}
}
?>
</div>
</section>
<?php include_once "../template/footer.php"; ?>
	</body>
</html>
