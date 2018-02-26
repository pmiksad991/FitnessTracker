<div class="navbar navbar-default" role="navigation" id="navbar2">
				<div class="container">
						<ul class="nav navbar-nav">
							<li <?php if(basename($_SERVER['PHP_SELF'])=="statistika.php"){
            					echo ' class="active"';
        					} ?>><a href="<?php echo $locAPP; ?>private/statistika_tijela/statistika.php">Masti</a></li>
							<li <?php if(basename($_SERVER['PHP_SELF'])=="tezina.php"){
            					echo ' class="active"';
        					} ?>><a href="<?php echo $locAPP; ?>private/statistika_tijela/tezina.php">Težina</a></li>
						</ul>
				</div>
			</div>