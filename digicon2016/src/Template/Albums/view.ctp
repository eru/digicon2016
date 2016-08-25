<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?= $this->Html->link(__('Edit Album'), ['action' => 'edit']); ?></li>
    <li>
      <ul>
      <?php foreach ($albums as $album): ?>
        <li>
          <?= $this->Html->link(h($album->name), ['action' => 'view', $album->id]); ?></li>
        </li>
      <?php endforeach; ?>
      </ul>
    </li>
</ul>
<?php
$this->end();
?>

<div id="map_canvas" style="width: 80%; height: 509px;"></div>

<?= $this->append('script'); ?>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.14.1/moment.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.14.1/locale/ja.js"></script>
<script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyAKwHYrfiTrRlMhSNzKo47yuZsGRllSi2Q&sensor=false"></script>
<script><!-- //
var photos = <?= json_encode($photos, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>;

$(function() {
  initialize();
});

function initialize() {
  $('#map_canvas').css('height', $(window).height() * 0.8 + 'px');
  var latlng = new google.maps.LatLng(30.376276,140.476069);
  var myZoom = 16;
  var opts = {
    zoom: 10,
    center: latlng,
    zoom: myZoom ,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };

  var map = new google.maps.Map(document.getElementById("map_canvas"), opts);

  var latlng2;
  var lat, lng;
  var iwopts;
  var infowindow;
  var photo;
  var south = 90.0, north = 0.0, west = 180.0, east = 0.0;

  for (var i=0 ; i< photos.length; i++){
    photo = photos[i];

    lat = Number(photo.lat);
    lng = Number(photo.lng);
    latlng2 = new google.maps.LatLng(lat,lng);

    iwopts = {
      position: latlng2,
      maxWidth: 150,
      content: '<p>' + moment(photo.shooted).format('Y-MM-DD HH:mm') + '</p>' + '<p><img src="/album_photos/' + photo.id + '.jpg" style="max-width: 100px; max-height: 100px;" /></p>' + (photo.description ? ('<p>' + photo.description + '</p>') : '')
    };

    infowindow = new google.maps.InfoWindow(iwopts);
    infowindow.open(map);

    if (lat < south){south = lat;}
    if (lat > north){north = lat;}
    if (lng < west){west = lng;}
    if (lng > east){east = lng;}

  }


  var ll_center = new google.maps.LatLng((south+north)/2,(west+east)/2);
  map.setCenter(ll_center);

  var ll_sw = new google.maps.LatLng(south,west);
  var ll_ne = new google.maps.LatLng(north,east);
  var latLngBounds = new google.maps.LatLngBounds(ll_sw, ll_ne);
  map.fitBounds(latLngBounds);
}

// --></script>
<?= $this->end(); ?>
