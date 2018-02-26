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
		if(isset($_GET["uvjet"])){
			$uvjet=str_replace("%", "", $_GET["uvjet"]);
		}else{
			$uvjet="";
		}
$id=$_GET["id"];

$stmt=$conn->prepare("select * from hrana where id=:id");
$stmt->execute(array("id" => $id));
$result = $stmt->fetchAll(PDO::FETCH_OBJ);

$stmt2=$conn->prepare("select count(id_hrane) from obrok_hrana where id_hrane=:id");
	$stmt2->execute(array("id"=>$id));
	$ukupno = $stmt2->fetchColumn();
?>
<!DOCTYPE html>
<html>
	<head>
		<?php include_once "../../template/head.php"; ?>
	</head>
	<body>
		<?php include_once "../../template/header.php"; ?>
		<section class="container">
			<div class="col-sm-2"></div>
			<div class="col-sm-8"><h1><img src="<?php echo $locAPP; ?>img/Gym.ico">FITNESSTRACKER</h1></div>
			<div class="col-sm-2"></div>
		</section>
		<section class="container" id="ostalo">
			<div class="col-sm-6" id="hranaStatistika">
			<table>
			<tr>
			<td><h3><?php echo $result[0]->naziv; ?></h3></td>
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
            <div class="row" style="text-align: center; margin-top: 10px;">
            <a href="uredi.php?id=<?php echo $id ?>" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span> Uredi</a>&nbsp;&nbsp;&nbsp;
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-trash"></span> Izbriši</button>
            </div>
            <a href="obrok.php<?php if($uvjet!=""){
				echo "?uvjet=".$uvjet;
			} ?>"><span class="glyphicon glyphicon-chevron-left"></span>Nazad</a>
			</div>
			<div class="col-sm-6" id="ostalo">
					<script src="https://code.highcharts.com/highcharts.js"></script>
					<script src="https://code.highcharts.com/modules/exporting.js"></script>
					<div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
					<?php include_once "hranaChart.php"; ?>
			</div>
			
		</section>
		<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Jeste li sigurni?</h4>
      </div>
      <div class="modal-body">
      <?php if($ukupno==0){ ?>
      	<a href="delete.php?id=<?php echo $id ?>" class="btn btn-warning"><span class="glyphicon glyphicon-ok"></span> Da</a>
      <?php } ?>
      <?php if($ukupno!=0){ ?>
      	<a href="#" class="btn btn-warning" id="blur"> Da</a>
      <?php } ?>
        <button type="button" class="btn btn-info" data-dismiss="modal">Odustani</button> 
      </div>
      <?php if($ukupno!=0){ ?>
      <div class="modal-footer">
      <div class="alert alert-danger" role="alert">Ne može se izbrisati jer se koristi</div>
      </div>
      <?php } ?>
    </div>

  </div>
</div>
<?php include_once "../../template/footer.php"; ?>
	</body>
</html>