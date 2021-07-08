<script src="<?php echo base_url() ?>assets/vendors/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/popper.js/dist/umd/popper.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/assets/js/main.js"></script>

<script src="<?php echo base_url() ?>assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/jszip/dist/jszip.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/pdfmake/build/vfs_fonts.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
<script src="<?php echo base_url() ?>assets/assets/js/init-scripts/data-table/datatables-init.js"></script>
</script>

<!-- <script src="<?php echo base_url() ?>assets/vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>assets/assets/js/dashboard.js"></script>
    <script src="<?php echo base_url() ?>assets/assets/js/widgets.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script> -->


<script src="<?php echo base_url() ?>assets/assets/js/main.js"></script>
<!--  Chart js -->
<!-- <script src="<?php echo base_url() ?>assets/assets/js/drilldown/script.js"></script> -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
</body>

<script>
  <?php
  foreach ($totalKecamatan as $data) {
    $kecamatan[] = $data->kecamatan;
    $Ekonomi1[] = $data->A;
    $KDRT1[] = $data->B;
    $MenikahDini1[] = $data->C;
    $Poligami1[] = $data->D;
    $Selingkuh1[] = $data->E;
  }
  ?>
  var KDRT = <?php echo json_encode($KDRT1); ?>;
  Highcharts.chart('container', {
    chart: {
      type: 'bar'
    },
    title: {
      text: 'Pemetaan Kasus Per Kecamatan'
    },
    xAxis: {
      categories: <?php echo json_encode($kecamatan); ?>
    },
    yAxis: {
      min: 0,
      title: {
        text: 'Total Kasus Per Kecamatan'
      }
    },
    legend: {
      reversed: true
    },
    plotOptions: {
      series: {
        stacking: 'normal'
      }
    },
    series: [{
      name: 'Ekonomi',
      data: <?php echo json_encode($Ekonomi1, JSON_NUMERIC_CHECK); ?>
    }, {
      name: 'KDRT',
      data: KDRT
    }, {
      name: 'MenikahDini',
      data: <?php echo json_encode($MenikahDini1, JSON_NUMERIC_CHECK); ?>
    }, {
      name: 'Poligami',
      data: <?php echo json_encode($Poligami1, JSON_NUMERIC_CHECK); ?>
    }, {
      name: 'Selingkuh',
      data: <?php echo json_encode($Selingkuh1, JSON_NUMERIC_CHECK); ?>
    }]
  });

  <?php
  foreach ($totalUsia as $data2) {
    $usia[] = $data2->usia;
    $usiaCeraiTotal[] = $data2->totalUsiaCerai;
  }
  ?>
  Highcharts.chart('container2', {

    chart: {
      type: 'column'
    },

    title: {
      text: 'Total Perceraian Berdasarkan Usia'
    },

    xAxis: {
      categories: <?php echo json_encode($usia); ?>
    },

    yAxis: {
      allowDecimals: false,
      min: 0,
      title: {
        text: 'Total Kasus'
      }
    },

    tooltip: {
      formatter: function() {
        return 'Usia <b>' + this.x + '</b><br/>' +
          // this.series.name + ': ' + this.y + '<br/>' +
          'Total Kasus: ' + this.point.stackTotal;
      }
    },

    plotOptions: {
      column: {
        stacking: 'normal'
      }
    },

    series: [{
      name: 'Usia',
      data: <?php echo json_encode($usiaCeraiTotal, JSON_NUMERIC_CHECK); ?>,
      stack: 'male'
    }]
  });


  <?php
  foreach ($rentangUsia as $data3) {
    $rentangUsia[] = $data3->kelompok;
    $totalKasusSelisih[] = $data3->kasusTotalRentang;
  }
  ?>

  Highcharts.chart('container3', {

    chart: {
      type: 'line'
    },

    title: {
      text: 'Rentang Usia Pasangan Kasus Perceraian'
    },

    xAxis: {

      categories: ['0-10', '11-20', '21-30', '30+']
    },

    yAxis: {
      allowDecimals: false,
      min: 0,
      title: {
        text: 'Total Kasus'
      }
    },

    tooltip: {
      formatter: function() {
        return 'Usia <b>' + this.x + '</b><br/>' +
          // this.series.name + ': ' + this.y + '<br/>' +
          'Total Kasus: ' + this.point.stackTotal;
      }
    },

    plotOptions: {
      column: {
        stacking: 'normal'
      }
    },

    series: [{
      name: 'Usia',
      data: <?php echo json_encode($totalKasusSelisih, JSON_NUMERIC_CHECK); ?>,
      stack: 'male'
    }]
  });
  // Create the chart
  // Highcharts.chart('container3', {
  //   chart: {
  //     type: 'pie'
  //   },
  //   title: {
  //     text: 'Browser market shares. January, 2018'
  //   },
  //   subtitle: {
  //     text: 'Click the slices to view versions. Source: <a href="http://statcounter.com" target="_blank">statcounter.com</a>'
  //   },

  //   accessibility: {
  //     announceNewData: {
  //       enabled: true
  //     },
  //     point: {
  //       valueSuffix: '%'
  //     }
  //   },

  //   plotOptions: {
  //     series: {
  //       dataLabels: {
  //         enabled: true,
  //         format: '{point.name}: {point.y:.1f}%'
  //       }
  //     }
  //   },

  //   tooltip: {
  //     headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
  //     // pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
  //   },

  //   series: [
  //     {
  //       name: "Browsers",
  //       colorByPoint: true,
  //       data: [
  //         {
  //           name: "Chrome",
  //           y: <?php echo json_encode($totalKasusSelisih); ?>,
  //         }
  //       ]
  //     }
  //   ],
  // });
</script>