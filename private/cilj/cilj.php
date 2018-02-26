<?php

include_once '../../config.php';

if(!isset($_SESSION["connected"])){
	header("location: ../../logout.php");
}

$id=$_SESSION["connected"][0]->id;
$stmt=$conn->prepare("select * from cilj where id_korisnika=".$id);
$stmt->execute();
$cilj=$stmt->fetchAll(PDO::FETCH_OBJ);	

?>
<!DOCTYPE html>
<html>
	<head>
		<?php include_once "../../template/head.php"; ?>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	</head>
	<body>
		<?php include_once "../../template/header.php"; ?>
		<section class="container">
			<div class="col-sm-2"></div>
			<div class="col-sm-8"><h1><img src="<?php echo $locAPP; ?>img/Gym.ico">FITNESSTRACKER</h1></div>
			<div class="col-sm-2"></div>
		</section>
		<section class="container">
			<div class="col-sm-3"></div>
			<div class="col-sm-6" id="ostalo">
		
				
				<table>
					<tr>
						<th>Info</th>
						<th>Cilj</th>
						<th>Datum</th>
						<th>Izbriši</th>
					</tr>
				<?php
				if($cilj==null){
					echo "<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>";
				}else{
				foreach ($cilj as $red) {
					if($red->tezina_stanje==1){
					echo "<tr><td>Gubitak težine</td><td>".$red->tezina_cilj."</td><td>".$red->datum_cilj."</td>";
					
    				echo '<td><a href="#" data-toggle="modal" data-target="#myModal" style="color:red;">Izbriši</a></td></tr>';
					}
					if($red->tezina_stanje==2){
					echo "<tr><td>Dobitak težine</td><td>".$red->tezina_cilj."</td><td>".$red->datum_cilj."</td>";
					
    				echo '<td><a href="#" data-toggle="modal" data-target="#myModal" style="color:red;"">Izbriši</a></td></tr>';
					}
				}
			}
				?>
			</table>
			<hr>
			<?php
			?>
				<p>Postavi novi cilj:</p>
				<form action="postavicilj.php" method="post">
					<div class="input-group">
					<span class="input-group-addon">Težina</span>
					<input type="number" name="tezina" class="form-control">
					</div>
				 	<br>
				 	<div class="input-group date">
				 	<span class="input-group-addon">Datum</span>
				 	<input type="text" class="form-control" id="datepicker" name="datum">
				 	</div><br>
				 	<div class="input-group">
					<span class="input-group-addon">Cilj težine</span>
					<span class="input-group-addon">Gubitak<input type="radio" name="tezina_stanje" value="1" checked></span>
					<span class="input-group-addon">Dobitak<input type="radio" name="tezina_stanje" value="2"></span>
					</div><br>
				 	<br><br>
				 	<button type="button submit" class="btn btn-primary" name="postavicilj">Prihvati</button>
				</form> 
			</div>
			<div class="col-sm-3"></div>
		</section>
		<script type="text/javascript">
             $( function() {
    			$( "#datepicker" ).datepicker();

 			 } );
        </script>
        <?php include_once "../../template/footer.php"; ?>
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
      	<a href="izbrisi.php?id=<?php echo $red->id ?>" class="btn btn-warning"><span class="glyphicon glyphicon-ok"></span> Da</a>
        <button type="button" class="btn btn-info" data-dismiss="modal">Odustani</button> 
      </div>
    </div>

  </div>
</div>
	</body>
</html>