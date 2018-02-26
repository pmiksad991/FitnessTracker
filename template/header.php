<header class="jumbotron">
			<div class="navbar navbar-default" role="navigation" id="navbar">
				<div class="container">
					<div class="navbar-header">
						<button type="butotn" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					
					<div class="navbar-collapse collapse">
						<ul class="nav navbar-nav">
							<li <?php if(basename($_SERVER['PHP_SELF'])=="index.php"){
            					echo ' class="active"';
        					} ?>><a href="<?php echo $locAPP; ?>private/index.php">Home</a></li>
							<li <?php if(basename($_SERVER['PHP_SELF'])=="cilj.php"){
            					echo ' class="active"';
        					} ?>><a href="<?php echo $locAPP; ?>private/cilj/cilj.php">Izaberi cilj</a></li>
							<li <?php if((basename($_SERVER['PHP_SELF'])=="statistika.php") || (basename($_SERVER['PHP_SELF'])=="tezina.php")){
            					echo ' class="active"';
        					} ?>><a href="<?php echo $locAPP; ?>private/statistika_tijela/statistika.php">Statistika</a></li>
        					<li <?php if(basename($_SERVER['PHP_SELF'])=="unosobroka.php"){
            					echo ' class="active"';
        					} ?>><a href="<?php echo $locAPP; ?>private/hrana/unosobroka.php">Unos obroka</a></li>
							<li <?php if(basename($_SERVER['PHP_SELF'])=="obrok.php"){
            					echo ' class="active"';
        					} ?>><a href="<?php echo $locAPP; ?>private/hrana/obrok.php">Hrana</a></li>
        					<li <?php if(basename($_SERVER['PHP_SELF'])=="era.php"){
            					echo ' class="active"';
        					} ?>><a href="<?php echo $locAPP; ?>private/era.php">ERA</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li  <?php if(basename($_SERVER['PHP_SELF'])=="user.php"){
            					echo ' class="active"';
        					} ?>><a href="<?php echo $locAPP; ?>private/user.php"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION["connected"][0]->ime ?></a></li>
							<li ><a href="<?php echo $locAPP; ?>logout.php"><span class="glyphicon glyphicon-log-out"></span> Odjava</a></li>
						</ul>
					</div>
				</div>
			</div>
		</header>