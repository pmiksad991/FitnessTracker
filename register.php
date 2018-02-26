<?php

include_once 'config.php';

?>
<!DOCTYPE html>
<html>
	<head>
		<?php include_once "template/head.php"; ?>
		<link rel="stylesheet" type="text/css" href="css/login.css">
	</head>
	<body>
		<section class="container">
			<div class="col-sm-4"></div>
			<div class="col-sm-4 well" id="prozor">
				<h2>Registracija uspješna.</h2><hr id="line">
				<p>Vraćanje na prijavu za <span id="counter" style="color:blue;">3</span> sekunde...</p>
					<script>
						setInterval(function() {
							var span = document.querySelector("#counter");
							var count = span.textContent * 1 - 1;
							span.textContent = count;
							if (count <= 0) {
								location.href="http://fittrackwp14.byethost6.com/fittrack/index.php";
							}
						}, 1000);
					</script>
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
</html>