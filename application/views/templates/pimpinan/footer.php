<script src="<?php echo base_url() ?>assets/vendors/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/popper.js/dist/umd/popper.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/assets/js/main.js"></script>


<!-- <script src="<?php echo base_url() ?>assets/vendors/chart.js/dist/Chart.bundle.min.js"></script>
<script src="<?php echo base_url() ?>assets/assets/js/dashboard.js"></script>
<script src="<?php echo base_url() ?>assets/assets/js/widgets.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/jqvmap/dist/jquery.vmap.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script> -->


<script src="<?php echo base_url() ?>assets/assets/js/main.js"></script>
<!--  Chart js -->
<!-- <script src="<?php echo base_url() ?>assets/assets/js/init-scripts/chart-js/chartjs-init.js"></script> -->

<?php if ($page == 'dashboard_faktor_penyebab') { ?>
    <script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script>
        window.onload = function() {

            var totalVisitors = 883000;
            var visitorsData = {
                "faktorPerkecamatan": [
                    <?php foreach ($graf_faktor as $row) {  ?> {
                            click: visitorsChartDrilldownHandler,
                            explodeOnClick: false,
                            type: "column",
                            name: "<?= $row->kecamatan ?>",
                            color: "<?= '#' . rand(777, 999999); ?>",
                            legendText: "<?= $row->kecamatan ?>",
                            showInLegend: true,
                            dataPoints: [<?php foreach ($row->data as $row2) { ?> {
                                    label: "<?= $row2->tahun ?>",
                                    name: '<?= $row2->kecamatan . ' ' . $row2->tahun ?>',
                                    y: <?= empty($row2->jumlah) ? 0 : $row2->jumlah ?>
                                }, <?php } ?>]
                        },
                    <?php } ?>
                ],
                <?php foreach ($graf_faktor as $row) {
                    foreach ($row->data as $row2) { ?> "<?= $row2->kecamatan . ' ' . $row2->tahun ?>": [{
                            type: "area",
                            legendText: "KPI",
                            markerBorderColor: "white",
                            markerBorderThickness: 2,
                            showInLegend: true,
                            dataPoints: [<?php foreach ($row2->data3 as $row4) { ?> {
                                    label: '<?= $row4->faktor ?>',
                                    y: <?= empty($row4->kpi) ? 0 : $row4->kpi ?>
                                }, <?php } ?>]
                        }, {
                            type: "column",
                            legendText: "Faktor Perceraian",
                            showInLegend: true,
                            dataPoints: [<?php foreach ($row2->data2 as $row3) { ?> {
                                    label: '<?= $row3->faktor ?>',
                                    y: <?= empty($row3->jumlah_faktor) ? 0 : $row3->jumlah_faktor ?>,
                                    color: "<?= '#' . rand(777, 999999); ?>"
                                }, <?php } ?>]
                        }, ],
                <?php }
                } ?>
            };

            var newVSReturningVisitorsOptions = {
                animationEnabled: true,
                theme: "light2",
                title: {
                    text: "Perceraian perkecamatan"
                },
                subtitles: [{
                    text: "Klik untuk melihat detail",
                    backgroundColor: "#2eacd1",
                    fontSize: 16,
                    fontColor: "white",
                    padding: 5
                }],
                legend: {
                    cursor: "pointer",
                    itemclick: toggleDataSeries,
                    fontFamily: "calibri",
                    fontSize: 14,
                },
                data: []
            };

            var visitorsDrilldownedChartOptions = {
                animationEnabled: true,
                theme: "light2",
                axisX: {
                    labelFontColor: "#717171",
                    lineColor: "#a2a2a2",
                    tickColor: "#a2a2a2"
                },
                axisY: {
                    gridThickness: 0,
                    includeZero: false,
                    labelFontColor: "#717171",
                    lineColor: "#a2a2a2",
                    tickColor: "#a2a2a2",
                    lineThickness: 1
                },
                legend: {
                    cursor: "pointer",
                    itemclick: toggleDataSeries,
                    fontFamily: "calibri",
                    fontSize: 14,
                },
                data: []
            };

            var chart = new CanvasJS.Chart("chartContainer", newVSReturningVisitorsOptions);
            chart.options.data = visitorsData["faktorPerkecamatan"];
            chart.render();

            function toggleDataSeries(e) {
                if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                    e.dataSeries.visible = false;
                } else {
                    e.dataSeries.visible = true;
                }
                chart.render();
            }

            function visitorsChartDrilldownHandler(e) {
                chart = new CanvasJS.Chart("chartContainer", visitorsDrilldownedChartOptions);
                chart.options.data = visitorsData[e.dataPoint.name];
                chart.options.title = {
                    text: e.dataPoint.name
                }
                chart.render();
                $("#backButton").css("display", "block");
            }

            $("#backButton").click(function() {
                $(this).css("display", "none");
                chart = new CanvasJS.Chart("chartContainer", newVSReturningVisitorsOptions);
                chart.options.data = visitorsData["faktorPerkecamatan"];
                chart.render();
            });

        }
    </script>
<?php } else if ($page == 'dashboard_faktor_perkara') { ?>
    <script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script>
        window.onload = function() {

            var totalVisitors = 883000;
            var visitorsData = {
                "faktorPerkecamatan": [
                    <?php foreach ($graf_faktor as $row) {  ?> {
                            click: visitorsChartDrilldownHandler,
                            explodeOnClick: false,
                            type: "column",
                            name: "<?= $row->kecamatan ?>",
                            color: "<?= '#' . rand(777, 999999); ?>",
                            legendText: "<?= $row->kecamatan ?>",
                            showInLegend: true,
                            dataPoints: [<?php foreach ($row->data as $row2) { ?> {
                                    label: "<?= $row2->tahun ?>",
                                    name: '<?= $row2->kecamatan . ' ' . $row2->tahun ?>',
                                    y: <?= empty($row2->jumlah) ? 0 : $row2->jumlah ?>
                                }, <?php } ?>]
                        },
                    <?php } ?>
                ],
                <?php foreach ($graf_faktor as $row) {
                    foreach ($row->data as $row2) { ?> "<?= $row2->kecamatan . ' ' . $row2->tahun ?>": [{
                            type: "column",
                            legendText: "Faktor Perkara Perceraian",
                            showInLegend: true,
                            dataPoints: [<?php foreach ($row2->data2 as $row3) { ?> {
                                    label: '<?= $row3->faktor ?>',
                                    y: <?= empty($row3->jumlah_faktor) ? 0 : $row3->jumlah_faktor ?>,
                                    color: "<?= '#' . rand(777, 999999); ?>"
                                }, <?php } ?>]
                        }, ],
                <?php }
                } ?>
            };

            var newVSReturningVisitorsOptions = {
                animationEnabled: true,
                theme: "light2",
                title: {
                    text: "Perceraian perkecamatan"
                },
                subtitles: [{
                    text: "Klik untuk melihat detail",
                    backgroundColor: "#2eacd1",
                    fontSize: 16,
                    fontColor: "white",
                    padding: 5
                }],
                legend: {
                    cursor: "pointer",
                    itemclick: toggleDataSeries,
                    fontFamily: "calibri",
                    fontSize: 14,
                },
                data: []
            };

            var visitorsDrilldownedChartOptions = {
                animationEnabled: true,
                theme: "light2",
                axisX: {
                    labelFontColor: "#717171",
                    lineColor: "#a2a2a2",
                    tickColor: "#a2a2a2"
                },
                axisY: {
                    gridThickness: 0,
                    includeZero: false,
                    labelFontColor: "#717171",
                    lineColor: "#a2a2a2",
                    tickColor: "#a2a2a2",
                    lineThickness: 1
                },
                legend: {
                    cursor: "pointer",
                    itemclick: toggleDataSeries,
                    fontFamily: "calibri",
                    fontSize: 14,
                },
                data: []
            };

            var chart = new CanvasJS.Chart("chartContainer", newVSReturningVisitorsOptions);
            chart.options.data = visitorsData["faktorPerkecamatan"];
            chart.render();

            function toggleDataSeries(e) {
                if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                    e.dataSeries.visible = false;
                } else {
                    e.dataSeries.visible = true;
                }
                chart.render();
            }

            function visitorsChartDrilldownHandler(e) {
                chart = new CanvasJS.Chart("chartContainer", visitorsDrilldownedChartOptions);
                chart.options.data = visitorsData[e.dataPoint.name];
                chart.options.title = {
                    text: e.dataPoint.name
                }
                chart.render();
                $("#backButton").css("display", "block");
            }

            $("#backButton").click(function() {
                $(this).css("display", "none");
                chart = new CanvasJS.Chart("chartContainer", newVSReturningVisitorsOptions);
                chart.options.data = visitorsData["faktorPerkecamatan"];
                chart.render();
            });

        }
    </script>
<?php } else if ($page == 'dashboard') { ?>
    <script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script>
        window.onload = function() {
            // stacked
            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                toolTip: {
                    shared: true
                },
                legend: {
                    reversed: true,
                    cursor: "pointer",
                    itemclick: toggleDataSeries,
                    verticalAlign: "center",
                    horizontalAlign: "right"
                },
                data: [<?php foreach ($faktorPenyebab as $list) { ?> {
                        type: "stackedColumn",
                        name: "<?= $list->faktor_penyebab_perceraian ?>",
                        showInLegend: true,
                        dataPoints: [<?php foreach ($list->data as $list2) { ?> {
                                label: '<?= $list2->kecamatan ?>',
                                y: <?= $list2->jumlah ?>
                            }, <?php } ?>]
                    }, <?php } ?>]
            });
            chart.render();

            function toggleDataSeries(e) {
                if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                    e.dataSeries.visible = false;
                } else {
                    e.dataSeries.visible = true;
                }
                chart.render();
            }

            // multi colom
            var chart2 = new CanvasJS.Chart("chartContainer3", {
                animationEnabled: true,
                toolTip: {
                    shared: true
                },
                legend: {
                    cursor: "pointer",
                    itemclick: toggleDataSeries1
                },
                data: [<?php foreach ($faktorPerkara as $list) { ?> {
                        type: "column",
                        name: "<?= $list->jenis_perkara ?>",
                        legendText: "<?= $list->jenis_perkara ?>",
                        showInLegend: true,
                        dataPoints: [<?php foreach ($list->data as $list2) { ?> {
                                label: "<?= $list2->tahun ?>",
                                y: <?= $list2->jumlah ?>
                            }, <?php } ?>]
                    }, <?php } ?>]
            });
            chart2.render();

            function toggleDataSeries1(e) {
                if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                    e.dataSeries.visible = false;
                } else {
                    e.dataSeries.visible = true;
                }
                chart2.render();
            }
        }
    </script>
<?php } ?>

</body>