<!-- Styles -->
<style>
    .amcharts-chart-div a {
        display: none !important;
    }

    #chartdiv {
        width: 100%;
        height: 330px;
    }

    #chartdiv1 {
        width: 100%;
        height: 330px;
    }

    .amcharts-export-menu-top-right {
        top: 10px;
        right: 0;
    }

    #map {
        height: 500px;
    }
</style>

<!-- Resources -->
<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/serial.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
<style>
    #backButton {
        border-radius: 4px;
        padding: 8px;
        border: none;
        font-size: 16px;
        background-color: #2eacd1;
        color: white;
        position: absolute;
        top: 10px;
        right: 10px;
        cursor: pointer;
    }

    #backButton1 {
        border-radius: 4px;
        padding: 8px;
        border: none;
        font-size: 16px;
        background-color: #2eacd1;
        color: white;
        position: absolute;
        top: 10px;
        right: 10px;
        cursor: pointer;
    }
</style>

<div class="content mt-3">

    <div class="col-md-3 col-lg-3">
        <div class="card text-white">
            <div class=" btn-group">
                <button type="button" class="btn btn-success btn-sm">Pilih Tahun</button>
                <?php for ($i = date('Y') - 8; $i <= date('Y'); $i++) { ?>
                    <a href="<?php print site_url(); ?>dashboard/index/<?php echo $i; ?>" type="button" class="btn btn-primary btn-sm"><?php echo $i; ?></a>
                    <?php $thn_dash = $i ?>
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="breadcrumbs">
        <div class="col-sm-12">
            <div class="page-header float-center">
                <div class="page-title text-center">
                    <h1>Kasus perceraian berdasar faktor penyebab perceraian tahun <?= $thn ?></h1>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-1">
            <div class="card-body pb-0">
                <h4 class="mb-0">
                    Kasus: <span class="count"><?= $Poligami->jumlah ?></span>
                </h4>
                <p class="text-light">Poligami</p>
            </div>

        </div>
    </div>
    <!--/.col-->

    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-2">
            <div class="card-body pb-0">
                <h4 class="mb-0">
                    Kasus: <span class="count"><?= $Selingkuh->jumlah ?></span>
                </h4>
                <p class="text-light">Selingkuh</p>
            </div>

        </div>
    </div>
    <!--/.col-->

    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-3">
            <div class="card-body pb-0">
                <h4 class="mb-0">
                    Kasus: <span class="count"><?= $Ekonomi->jumlah ?></span>
                </h4>
                <p class="text-light">Ekonomi</p>
            </div>

        </div>
    </div>
    <!--/.col-->

    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-4">
            <div class="card-body pb-0">
                <h4 class="mb-0">
                    Kasus: <span class="count"><?= $Menikah_Dini->jumlah ?></span>
                </h4>
                <p class="text-light">Menikah Dini</p>
            </div>

        </div>
    </div>
    <!--/.col-->

    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-5">
            <div class="card-body pb-0">
                <h4 class="mb-0">
                    Kasus: <span class="count"><?= $KDRT->jumlah ?></span>
                </h4>
                <p class="text-light">KDRT</p>
            </div>

        </div>
    </div>
    <!--/.col-->

    <div class="breadcrumbs">
        <div class="col-sm-12">
            <div class="page-header float-center">
                <div class="page-title text-center">
                    <h1>Kasus perceraian berdasar jenis perkara perceraian tahun <?= $thn ?></h1>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-3">
            <div class="card-body pb-0">
                <h4 class="mb-0">
                    Kasus: <span class="count"><?= $Cerai_Gugat->jumlah ?></span>
                </h4>
                <p class="text-light">Cerai Gugat</p>
            </div>

        </div>
    </div>
    <!--/.col-->

    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-4">
            <div class="card-body pb-0">
                <h4 class="mb-0">
                    Kasus: <span class="count"><?= $Cerai_Talak->jumlah ?></span>
                </h4>
                <p class="text-light">Cerai Talak</p>
            </div>

        </div>
    </div>
    <!--/.col-->

    <div class="breadcrumbs">
        <div class="col-sm-12">
            <div class="page-header float-center">
                <div class="page-title text-center">
                    <h1>Statistik perceraian tahun <?= $thn ?></h1>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3">Faktor Penyebab Perceraian Perkecamatan</h4>
                <div id="chartContainer" style="height: 450px; width: 100%;">
                </div>
            </div>
        </div>
    </div><!-- /# column -->

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3">Sebaran Kasus Perceraian</h4>
                <div id="map"></div>
            </div>
        </div>
    </div><!-- /# column -->

    <div class="breadcrumbs">
        <div class="col-sm-12">
            <div class="page-header float-center">
                <div class="page-title text-center">
                    <h1>Statistik Faktor Perkara</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3">Faktor Perkara Perceraian Pertahun</h4>
                <div id="chartContainer3" style="height: 450px; width: 100%;">
                </div>
            </div>
        </div>
    </div><!-- /# column -->

</div> <!-- .content -->

<script>
    var map = L.map('map').setView([0.5331793, 101.4499037], 12);
    map.addLayer(new L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map));

    function customermarker(no) {
        if (no == 0) {
            var icon = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|fa0303';
        } else if (no == 1) {
            var icon = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|d92626';
        } else if (no == 2) {
            var icon = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|ca3f3f';
        } else if (no == 3) {
            var icon = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|f73e08';
        } else if (no == 4) {
            var icon = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|fc9901';
        } else if (no == 5) {
            var icon = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|fcd601';
        } else if (no == 6) {
            var icon = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|f2ef10';
        } else if (no == 7) {
            var icon = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|d3f210';
        } else if (no == 8) {
            var icon = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|9cf210';
        } else if (no == 9) {
            var icon = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|28ed3d';
        } else {
            var icon = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|296d31';
        }
        var Icon = L.icon({
            iconUrl: icon,
            shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
        });

        return Icon
    }

    <?php $i = 0;
    foreach ($maps as $mar) { ?>

        var marker = L.marker([<?= $mar->la ?>, <?= $mar->lo ?>], {
            icon: customermarker(<?= $i ?>)
        }).addTo(map);
        var popup = L.popup()
            .setContent('<center><b>Data Perceraian <?= $mar->kecamatan ?> kasus <?= $mar->jumlah ?></b></center><hr><br><center><table border=1><tr><td>Usia</td><td>Pria</td><td>Wanita</td></tr><?php foreach ($mar->data2 as $row) { ?><tr><td><?= $row->usia ?></td><td><?= $row->jml_suami ?></td><td><?= $row->jml_istri ?></td></tr> <?php } ?> </table></center>');
        marker.bindPopup(popup, {
            maxHeight: "200"
        }).closePopup();
    <?php $i++;
    } ?>
    // end ->marker
</script>

</html>\