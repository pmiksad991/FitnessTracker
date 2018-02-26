<?php

include_once '../config.php';

if(!isset($_SESSION["connected"])){
	header("location: ../logout.php");
}
$id=$_SESSION["connected"][0]->id;
if(isset($_POST["changepassword"]) && $_POST["newpassword"]==$_POST["newpassword2"] && $_POST["oldpassword"]==$_SESSION["connected"][0]->pass){
	$stmt=$conn->prepare("update korisnik set pass=:pass where id=".$id."");
	$stmt->execute(array("pass"=>$_POST["newpassword"]));
	header("location: ../logout.php");
}
$phpdate = strtotime( $_SESSION["connected"][0]->datum_rodenja );
$datum = date( 'm.d.Y', $phpdate );
?>
<!DOCTYPE html>
<html>
	<head>
		<?php include_once "../template/head.php"; ?>
	</head>
	<body>
		<?php include_once "../template/header.php"; ?>
		<section class="container">
			<div class="col-sm-2"></div>
			<div class="col-sm-8"><h1><img src="<?php echo $locAPP; ?>img/Gym.ico">FITNESSTRACKER</h1></div>
			<div class="col-sm-2"></div>
		</section>
		<section class="container">
			<div class="col-sm-3"></div>
			<div class="col-sm-6" id="ostalo">
					<b>Ime:</b> <?php echo $_SESSION["connected"][0]->ime; ?><br><br>
					<b>Prezime:</b> <?php echo $_SESSION["connected"][0]->prezime; ?><br><br>
					<b>Datum rođenja:</b> <?php echo $datum; ?><br><br>
					<b>Korisničko ime:</b> <?php echo $_SESSION["connected"][0]->username; ?><br><br>
					<b>E-mail:</b> <?php echo $_SESSION["connected"][0]->email; ?><br><br>
					<button class="btn btn-primary" data-toggle="modal" data-target="#sifraModal">Promijeni šifru</button>
			</div>
			<div class="col-sm-3"></div>
		</section>
		<script>
			$('#sifraModal').on('shown.bs.modal', function () {
  			$('#oldpassword').focus()
});
		</script>
		<!-- Modal -->
		<div class="modal fade" id="sifraModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title" id="exampleModalLabel">Promjena šifre</h4>
					</div>
					<div class="modal-body">
					<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
						<div class="input-group">
					<span class="input-group-addon">Stara lozinka</span>
					<input type="password" name="oldpassword" class="form-control" placeholder="•••••" id="oldpassword" value="">
					</div><br>
					<div class="input-group">
					<span class="input-group-addon">Nova lozinka</span>
					<input type="password" name="newpassword" class="form-control" placeholder="•••••" id="newpassword" value="">
					</div><br>
					<div class="input-group">
					<span class="input-group-addon">Ponovi lozinku</span>
					<input type="password" name="newpassword2" class="form-control" placeholder="•••••" id="newpassword2" value="">
					</div><br>
					
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">
							Poništi
						</button>
						<button type="button submit" class="btn btn-primary" name="changepassword">
							Promjeni šifru
						</button>
					
					</div>
					</form>
				</div>
			</div>
		</div>
		<?php include_once "../template/footer.php"; ?>
	</body>
</html>