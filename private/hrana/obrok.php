<?php

include_once '../../config.php';

if(!isset($_SESSION["connected"])){
	header("location: ../../logout.php");
}

$uvjet="";
		if(isset($_GET["uvjet"])){
			$uvjet="%" . $_GET["uvjet"] . "%";
		}else{
			$uvjet="%";
		}
$perPage=6;
			
			$stmt = $conn -> prepare("
			select count(id) from hrana where naziv like :uvjet;
			");
			$stmt -> execute(array("uvjet" => $uvjet));
			$total = $stmt->fetchColumn();
			
			$totalPages=ceil($total/$perPage);
			
			
			if(isset($_GET["page"])){
				$page=$_GET["page"];
			}else{
				$page=1;
			}
			
			if($page>$totalPages){
				$page=1;
			}
			
			if($page==0){
				$page=$totalPages;
			}
			
			$from = $page*$perPage-$perPage;

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
		<section class="container">
			<div class="col-sm-1"></div>
			<div class="col-sm-10">
				
					<div class="row">
					<div class="col-md-9">
						<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="GET">
							<input value="<?php echo str_replace("%","", $uvjet); ?>" type="text" name="uvjet" class="form-control" placeholder="Unesite naziv..." id="uvjet">
							</div>
							<div class="col-md-3">
							<button type="button submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Traži</button>
						</form>
							<a href="dodaj.php" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Dodaj hranu</a>
				</div>
				</div>
				<hr>
				<div class="row">
				<?php
				$stmt = $conn -> prepare("select * from hrana where naziv like :uvjet order by naziv asc limit :from,:perPage;");
				$stmt -> execute(array("uvjet" => $uvjet, "from"=>$from,"perPage"=>$perPage));
				$total = $stmt->fetchAll(PDO::FETCH_OBJ);
					foreach ($total as $red) {
						?>
						<div class="col-lg-4 col-sm-6 col-md-4">
						<div class="thumbnail" id="ostalo">
						<div class="caption">
						<h4><?php echo $red->naziv ?></h4>
						<hr>
						<ul>
							<li><b>Kalorije:</b> <?php echo $red->kalorije ?> g</li>
							<li><b>Ugljikohidrati:</b> <?php echo $red->ugljikohidrati ?> g</li>
							<li><b>Protein:</b> <?php echo $red->protein ?> g</li>
						</ul>
						<a href="hrana.php?id=<?php echo $red->id ?><?php
						if(isset($uvjet)){
							?>
							&uvjet=<?php echo $uvjet; ?>
							<?php
						}
						 ?>" class="btn btn-info">Više...</a>
					</div>
				</div>

			</div>
						<?php
					}
				?>
			</div>	
			<div class="col-sm-1"></div>
			<div class="col-md-12 col-sm-12">
				<nav aria-label="Page navigation">
  <ul class="pagination">
  <?php if($page==1){ ?>
    <li>
      <a href="?uvjet=<?php echo str_replace("%","", $uvjet); ?>&<?php echo "page=" . ($totalPages) ?>"" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <?php }else{ ?>
    <li>
      <a href="?uvjet=<?php echo str_replace("%","", $uvjet); ?>&<?php echo "page=" . ($page-1) ?>"" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <?php } ?>
    <?php
    for($i=1;$i<=$totalPages;$i++):
			if($i==$page):
			 ?>
			<li class="active"><a href="#"><?php echo $i ?> <span class="sr-only">(current)</span></a></li>

			
			<?php else: ?>
			<li>
				<a href="?uvjet=<?php echo str_replace("%","", $uvjet); ?>&page=<?php echo $i; ?>" ><?php echo $i; ?></a>
			</li>
			
			<?php endif; ?>
			
			<?php endfor; ?>
	<?php if($page!=$totalPages){ ?>
    <li>
      <a href="?uvjet=<?php echo str_replace("%","", $uvjet); ?>&<?php echo "page=" . ($page+1) ?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
    <?php }else{ ?>
    <li>
      <a href="?uvjet=<?php echo str_replace("%","", $uvjet); ?>&<?php echo "page=1" ?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
    <?php } ?>
  </ul>
</nav>
			</div>
		</section>
		<?php include_once "../../template/footer.php"; ?>
		<script>
			$("#uvjet").focus();
		</script>
	</body>
</html>
