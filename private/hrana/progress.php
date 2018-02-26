<?php
function progressBar($naziv, $sada, $max){
	$posto = $sada/$max;
?>
					<?php echo $naziv ?> <div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $sada ?>" aria-valuemin="0" aria-valuemax="<?php echo $max ?>" style="width: <?php echo $posto ?>%;">
    <p><?php echo $sada."/".$max; ?></p>
  </div>
</div>
<?php
}
?>