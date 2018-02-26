<?php

include_once 'config.php';
?>
<?php
			$stmt=$conn->prepare("select username, pass, email from korisnik");
			$stmt->execute();
			$result = $stmt->fetchAll(PDO::FETCH_OBJ);

$poruke=array();

if(isset($_POST["input"])){
	
	include_once 'check.php';
	foreach ($result as $red) {
		if($red->username==$_POST["username"]){
			$poruke["username"]="Korisničko ime se već koristi.";
		}if($red->email==$_POST["mail"]){
			$poruke["mail"]="Račun sa ovim e-mailom već postoji.";
		}
	}

	if(count($poruke)==0){
		//radi insert
		unset($_POST["input"]);
		$stmt=$conn->prepare("insert into korisnik (id, ime, prezime, datum_rodenja, spol, username, pass, email) values 
		(null, :ime, :prezime, :datum, :spol, :username, :pass, :mail)");
	$stmt->execute($_POST);
		header("location: register.php");
	}
}

?>
<!DOCTYPE html>
<html>
	<head>
		<?php include_once "template/head.php"; ?>
		<link rel="stylesheet" type="text/css" href="css/login.css">
		<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
	</head>
	<body>
		<section class="container">
			<div class="col-sm-4">
			</div>
			<div class="col-sm-4 well" id="prozor">
				<h2>Dobrodošli u<br>Fitness Tracker</h2>
				<?php if(isset($_POST["input"])){ ?>
				<p style="color: red;">Registracija neuspješna!</p>
				<?php } ?>
				<hr id="line">
				<form action="authorize.php" method="post" id="id1">
					<div class="input-group">
					<span class="input-group-addon">Korisničko ime</span>
					<input type="text" name="username" class="form-control" placeholder="username" aria-describedby="usernamehelp" <?php 
				  if(isset($_POST["username"])){
				  	?>
				  	value="<?php echo $_POST["username"] ?>"
				  	<?php
				  }else{
				   ?>
					value="mmarkic"
				   	<?php
				  }
				   ?>>
					</div><br>
					<div class="input-group">
					<span class="input-group-addon">Lozinka</span>
					<input type="password" name="password" class="form-control" placeholder="•••••" aria-describedby="passhelp" <?php 
				  if(isset($_POST["password"])){
				  	?>
				  	value="<?php echo $_POST["password"] ?>"
				  	<?php
				  }else{
				   ?>
					value="sifra1"
				   	<?php
				  }
				   ?>>
					</div><br>
					<button type="button submit" class="btn btn-primary" name="connect"><span class="glyphicon glyphicon-log-in"></span> Prijavi se</button>
				</form>




				<form name="register" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post" id="id2">
					<div class="input-group">
					<span class="input-group-addon">Ime</span>
					<input type="text" name="ime" class="form-control" placeholder="ime" id="ime" aria-describedby="imehelp" <?php 
				  if(isset($_POST["ime"])):
				  	?>
				  	value="<?php echo $_POST["ime"] ?>"
				  	<?php
				  endif;
				   ?>>
					
					</div>
					<?php if (isset($poruke["ime"])): ?>
					<div class="alert alert-danger" role="alert"><p class="form-text text-muted" id="imehelp"><?php echo $poruke["ime"]; ?></p></div>
					<?php endif; ?> <br>
					<div class="input-group">
					<span class="input-group-addon">Prezime</span>
					<input type="text" name="prezime" class="form-control" placeholder="prezime" id="prezime" aria-describedby="prezimehelp" <?php 
				  if(isset($_POST["prezime"])):
				  	?>
				  	value="<?php echo $_POST["prezime"] ?>"
				  	<?php
				  endif;
				   ?>>
					 

					</div>
					<?php if (isset($poruke["prezime"])): ?>
					<div class="alert alert-danger" role="alert"><p class="form-text text-muted" id="prezimehelp"><?php echo $poruke["prezime"]; ?></p></div>
					<?php endif; ?><br>
					<div class="input-group">
					<span class="input-group-addon">Datum rođenja</span>
					<input id="datumrod" name="datum" type="text" class="form-control">

					</div><br>
					<div class="input-group">
					<span class="input-group-addon">Spol</span>
					<span class="input-group-addon">M<input type="radio" name="spol" value="M" checked></span>
					<span class="input-group-addon">Ž<input type="radio" name="spol" value="Ž"></span>
					</div><br>
					<div class="input-group">
					<span class="input-group-addon">Korisničko ime</span>
					<input type="text" name="username" class="form-control" placeholder="username" id="username" aria-describedby="usernamehelp" <?php 
				  if(isset($_POST["username"])):
				  	?>
				  	value="<?php echo $_POST["username"] ?>"
				  	<?php
				  endif;
				   ?>>
					 

					</div>
					<?php if (isset($poruke["username"])): ?>
					<div class="alert alert-danger" role="alert"><p class="form-text text-muted" id="usernamehelp"><?php echo $poruke["username"]; ?></p></div>
					<?php endif; ?><br>
					<div class="input-group">
					<span class="input-group-addon">Lozinka</span>
					<input type="password" name="pass" class="form-control" placeholder="•••••" id="pass" aria-describedby="passhelp" <?php 
				  if(isset($_POST["pass"])):
				  	?>
				  	value="<?php echo $_POST["pass"] ?>"
				  	<?php
				  endif;
				   ?>>
					 

					</div>
					<?php if (isset($poruke["pass"])): ?>
					<div class="alert alert-danger" role="alert"><p class="form-text text-muted" id="passhelp"><?php echo $poruke["pass"]; ?></p></div>
					<?php endif; ?><br>
					<div class="input-group">
						<span class="input-group-addon">Email</span>
						<input type="email" name="mail" class="form-control" placeholder="yourname@address.com" required id="mail" aria-describedby="mailhelp" <?php 
				  if(isset($_POST["mail"])):
				  	?>
				  	value="<?php echo $_POST["mail"] ?>"
				  	<?php
				  endif;
				   ?>>
					

					</div>
					<?php if (isset($poruke["mail"])): ?>
					<div class="alert alert-danger" role="alert"><p class="form-text text-muted" id="mailhelp"><?php echo $poruke["mail"]; ?></p></div>
					<?php endif; ?> <br><br>
					<button type="button submit" class="btn btn-primary" name="input"><span class="glyphicon glyphicon-user"></span> Registriraj se</button>
				</form><hr id="line">
				<div id="id3"><p>Novi korisnik?</p><button onclick="toggle1()" type="button submit" class="btn btn-primary"><span class="glyphicon glyphicon-user"></span> Registriraj se</button></div>
				<div id="id4"><p>Već registriran?</p><a href="index.php" type="button submit" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span> Prijavi se</a></div>
			</div>
			<div class="col-sm-4"></div>
		</section>
	</body>
	<script>
		function toggle1(){
			var x=document.getElementById("id1");
			var y=document.getElementById("id2");
			var w=document.getElementById("id3");
			var z=document.getElementById("id4");
			x.setAttribute("id", "id2");
			y.setAttribute("id", "id1");
			w.setAttribute("id", "id4");
			z.setAttribute("id", "id3");
		}
	</script>
	<?php if(isset($_POST["input"])){ ?>
				<script>
				var x=document.getElementById("id1");
				var y=document.getElementById("id2");
				var w=document.getElementById("id3");
				var z=document.getElementById("id4");
				x.setAttribute("id", "id2");
				y.setAttribute("id", "id1");
				w.setAttribute("id", "id4");
				z.setAttribute("id", "id3");
				</script>
				<?php } ?>
	<script src="<?php echo $locAPP ?>js/jquery-ui.js"></script>
	<script>			
			$.datepicker.regional['hr'] = {
					closeText : 'Zatvori',
					prevText : 'Prethodni',
					nextText : 'Sljedeći',
					currentText : 'Trenutni',
					monthNames : ['Siječanj', 'Veljača', 'Ožujak', 'Travanj', 'Svibanj', 'Lipanj', 'Srpanj', 'Kolovoz', 'Rujan', 'Listopad', 'Studeni', 'Prosinac'],
					monthNamesShort : ['sij', 'velj', 'ožu', 'tra', 'svi', 'lip', 'srp', 'kol', 'ruj', 'lis', 'stu', 'pro'],
					dayNames : ['Nedjelja', 'Ponedjeljak', 'Utorak', 'Srijeda', 'Četvrtak', 'Petak', 'Subota'],
					dayNamesShort : ['ned', 'pon', 'uto', 'sri', 'čet', 'pet', 'sub'],
					dayNamesMin : ['N', 'P', 'U', 'S', 'Č', 'P', 'S'],
					weekHeader : 'Tjedan',
					dateFormat : 'yy-mm-dd',
					firstDay : 1,
					isRTL : false,
					showMonthAfterYear : false,
					yearSuffix : '',
					changeMonth : true,
					changeYear : true,
					showButtonPanel : true,
					yearRange : '1940:2020'
				};
      	$.datepicker.setDefaults($.datepicker.regional['hr']);
      	
      	 var datum = document.getElementById('datumrod').value;
				
		$("#datumrod").datepicker();
		$("#datumrod").datepicker("option", $.datepicker.regional['hr']);
		$("#datumrod").val(datum);
	</script>
</html>