<?php
				$id=$_SESSION["connected"][0]->id;
				$stmt=$conn->prepare("select postotak_masti,MONTH(datum) as datum_mjesec,DAY(datum) as dan, YEAR(datum) as godina from statistika_tijela where id_korisnika=".$id." order by datum desc limit 12");
			$stmt->execute();
			$result = $stmt->fetchAll(PDO::FETCH_OBJ);
				?>
				<script>
$(function () {
    Highcharts.chart('container', {
        chart: {
            backgroundColor: '#F9FAFA',
            type: 'line'

        },
        title: {
            text: 'Statistika masti u tijelu u zadnjih 12 mjeseci'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            <?php
            

            echo "categories: [";
            foreach ($result as $red) {
                switch($red->datum_mjesec){
                case "1":
                echo "'".$red->dan.".Jan.".$red->godina."',";
                break;
                case "2":
                echo "'".$red->dan.".Feb.".$red->godina."',";
                break;
                case "3":
                echo "'".$red->dan.".Mar.".$red->godina."',";
                break;
                case "4":
                echo "'".$red->dan.".Apr.".$red->godina."',";
                break;
                case "5":
                echo "'".$red->dan.".May.".$red->godina."',";
                break;
                case "6":
                echo "'".$red->dan.".Jun.".$red->godina."',";
                break;
                case "7":
                echo "'".$red->dan.".Jul.".$red->godina."',";
                break;
                case "8":
                echo "'".$red->dan.".Aug.".$red->godina."',";
                break;
                case "9":
                echo "'".$red->dan.".Sep.".$red->godina."',";
                break;
                case "10":
                echo "'".$red->dan.".Oct.".$red->godina."',";
                break;
                case "11":
                echo "'".$red->dan.".Nov.".$red->godina."',";
                break;
                case "12":
                echo "'".$red->dan.".Dec.".$red->godina."',";
                break;
            }
            }
            echo "]";
            ?>
        },
        yAxis: {
            title: {
                text: '% masti u tijelu'
            }
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: false
            }
        },
        series: [{
            name: '<?php echo $_SESSION["connected"][0]->ime ?>',

            <?php
			

            echo "data: [";
            foreach ($result as $red) {
            	echo $red->postotak_masti.",";
            }
            echo "]";
            ?>

        }]
    });
});
</script>