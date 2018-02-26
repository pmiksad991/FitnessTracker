<?php

function inputPolje($tip,$naziv,$poruke,$vrijednost){
	?>
<div class="input-group">
  <span class="input-group-addon"><?php echo strtoupper(substr($naziv,0,1)) . substr($naziv, 1); ?></span>
				  <input class="form-control" 
				  <?php 
				  if(isset($_POST[$naziv])):
				  	?>
				  	value="<?php echo $_POST[$naziv] ?>"
				  	<?php
				  endif;
				   ?>
				   type="<?php echo $tip ?>" id="<?php echo $naziv ?>" name="<?php echo $naziv ?>" aria-describedby="<?php echo $naziv ?>Pomoc">
				   <?php if($vrijednost!=null){ ?>
				 <span class="input-group-addon"><?php echo $vrijednost ?></span>
				<?php } ?>
				  </div>
  				
				<?php if (isset($poruke[$naziv])): ?>
				<div class="alert alert-danger" role="alert"><p id="<?php echo $naziv ?>Pomoc"><?php echo $poruke[$naziv]; ?></p></div>
				<?php endif; echo "<br>";
}
