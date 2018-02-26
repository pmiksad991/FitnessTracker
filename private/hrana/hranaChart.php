
<script>
$(function () {

    $(document).ready(function () {

        // Build the chart
        Highcharts.chart('container', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: '<?php echo $result[0]->naziv; ?>'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Postotak u hrani',
                colorByPoint: true,
                data: [{
                    name: 'Protein',
                    y: <?php echo $result[0]->protein; ?>,
                }, {
                    name: 'Zasićene masne kiseline',
                    y: <?php echo $result[0]->zas_masti; ?>
                }, {
                    name: 'Kolesterol',
                    y: <?php echo (($result[0]->kolesterol)/100); ?>
                }, {
                    name: 'Natrij',
                    y: <?php echo (($result[0]->natrij)/100); ?>
                }, {
                    name: 'Ugljikohidrati',
                    y: <?php echo $result[0]->ugljikohidrati; ?>
                }, {
                    name: 'Šećer',
                    y: <?php echo $result[0]->secer; ?>
                }, {
                   name: 'Masti',
                    y: <?php echo $result[0]->masti; ?> 
                }]
            }]
        });
    });
});
</script>