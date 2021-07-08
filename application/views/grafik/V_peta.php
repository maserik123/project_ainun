 <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
 <!-- Make sure you put this AFTER Leaflet's CSS -->
 <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
 <link rel="stylesheet" href="<?= base_url() ?>/assets/leaflet/leaflet.css" />
 <script src="<?= base_url() ?>/assets/leaflet/leaflet.js"></script>
 <style>
   #map {
     height: 280px;
   }
 </style>
 <div class="row">
   <div class="col-xl-12">
     <div class="card">
       <div class="card-header">
         <h4>Sebaran Rata-rata Usia Cerai</h4>
       </div>
       <div class="card-body">
         <div id="map"> </div>
       </div>
     </div>
   </div>
 </div>

 <script>
   //sample data values for populate map

   // var map = L.map('map').setView([0.5331793,101.4499037], 16);
   var map = new L.Map('map', {
     zoom: 11,
     center: new L.latLng(0.5331793, 101.4499037)
   });

   var pilihKecamatan =
     map.addLayer(new L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
       attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
     }).addTo(map));

   <?php foreach ($petaUsia as $key => $value) { ?>
     L.marker([<?= $value->la ?>, <?= $value->lo ?>]).
     bindPopup("<b>Rata-Rata Usia: <?= $value->rata  ?> Tahun</b><br/><b>Kec: <?= $value->kecamatan ?></b>").
     addTo(map);
   <?php } ?>
 </script>