<!-- Styles -->
<style>
    #map {
        height: 500px;
    }
</style>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>


<div class="content mt-3">

    <div class="col-md-3 col-lg-3">
        <div class="card text-white">
            <div class=" btn-group">
                <button type="button" class="btn btn-success btn-sm">Pilih Tahun</button>
                <?php for ($i = date('Y') - 8; $i <= date('Y'); $i++) { ?>
                    <a href="<?php print site_url(); ?>dashboard/peta/<?php echo $i; ?>" type="button" class="btn btn-primary btn-sm"><?php echo $i; ?></a>
                    <?php $thn_dash = $i ?>
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3">Sebaran Kasus Perceraian</h4>
                <div id="map"></div>
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