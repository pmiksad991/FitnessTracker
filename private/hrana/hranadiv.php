<?php
include_once '../../config.php';
if(!isset($_SESSION["connected"])){
	header("location: ../../logout.php");
	exit;
}
if(!isset($_GET["sifra"])&&!isset($_GET["datum"])){
	exit;
}
$sifra=$_GET["sifra"];
$id=substr($sifra, 1);

$stmt=$conn->prepare("select * from hrana where id=:id");
$stmt->execute(array("id" => $id));
$result = $stmt->fetchAll(PDO::FETCH_OBJ);
$datum=$_GET["datum"];
if(!isset($result[0]->naziv)){
	exit;
}

?>

<div id="hranaStatistika2">
			<table>
			<tr>
			<td><h4><?php echo $result[0]->naziv; ?></h4></td>
			</tr>
			<tr>
			<td><b>Kalorije</b> <?php echo $result[0]->kalorije; ?> kcal</td>
			</tr>
			<tr>
				<td style="background-color: black;height:4px"></td>
			</tr>
			<tr>
            <td><b>Masti</b> <?php echo $result[0]->masti; ?> g</td>
            </tr>
			<tr>
            <td>&nbsp;&nbsp;&nbsp;od toga zasićene <?php echo $result[0]->zas_masti; ?> g</td>
            </tr>
			<tr>
            <td><b>Kolesterol</b> <?php echo $result[0]->kolesterol; ?> mg</td>
            </tr>
			<tr>
            <td><b>Natrij</b> <?php echo $result[0]->natrij; ?> mg</td>
            </tr>
			<tr>
            <td><b>Ugljikohidrati</b> <?php echo $result[0]->ugljikohidrati; ?> g</td>
            </tr>
			<tr>
            <td>&nbsp;&nbsp;&nbsp;od toga šećer <?php echo $result[0]->secer; ?> g</td>
            </tr>
			<tr>
            <td><b>Protein</b> <?php echo $result[0]->protein; ?> g</td>
            </tr>
            </table>
            <br>
            <div class="row" style="text-align: center;">
            <form action="dodajobrok.php" method="post">
            <input type="number" name="tezina" required>
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="hidden" name="datum" value="<?php echo $datum ?>">
            <button type="button submit" name="dodajhran" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span>Dodaj</button>
            </form>
            </div>
</div>

