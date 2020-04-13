<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Place the geocoder input outside the map</title>
<meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://api.mapbox.com/mapbox-gl-js/v1.9.1/mapbox-gl.js"></script>
<link href="https://api.mapbox.com/mapbox-gl-js/v1.9.1/mapbox-gl.css" rel="stylesheet" />
<style>
  body { margin: 0; padding: 0; }
  #map { position: absolute; top: 0; bottom: 0; width: 100%; }
</style>
</head>
<body>
<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.4.2/mapbox-gl-geocoder.min.js"></script>
<link
    rel="stylesheet"
    href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.4.2/mapbox-gl-geocoder.css"
    type="text/css"
/>
<!-- Promise polyfill script required to use Mapbox GL Geocoder in IE 11 -->
<script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.min.js"></script>
<style>
    .geocoder {
        position: absolute;
        z-index: 1;
        width: 100%;
        left: 100%;
        margin-left: -25%;
        top: 10px;
    }
    .mapboxgl-ctrl-geocoder {
        min-width: 100%;
    }
    #map {
        margin-top: 75px;
        width: 100%;
        height: 100%;
    }
    #info {
      display: block;
      position: relative;
      margin: 0px auto;
      width: 50%;
      padding: 10px;
      border: none;
      border-radius: 3px;
      font-size: 12px;
      text-align: center;
      color: #222;
      background: #fff;
    }
</style>
<div id="map"></div>
<div id="geocoder" class="geocoder"></div>
<pre id="info"></pre>
<script>
  mapboxgl.accessToken = 'pk.eyJ1IjoibmFkYXJhbiIsImEiOiJjazhyNDA4OHcwYXZqM29uMGRncGU3NTRuIn0.7vFNeJjjGR-tE-Z5vO4iyw';
    var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        center: [80.26138113863931, 13.141114656324703],
        zoom: 13
    });
    map.on('mousemove', function(e) {
      document.getElementById('info').innerHTML =
      // e.point is the x, y coordinates of the mousemove event relative
      // to the top-left corner of the map
      JSON.stringify(e.point) +
      '<br />' +
      // e.lngLat is the longitude, latitude geographical position of the event
      JSON.stringify(e.lngLat.wrap());
    });
    map.on('click',function(e){
      alert(JSON.stringify(e.lngLat.wrap()));
    });
    var geocoder = new MapboxGeocoder({
        accessToken: mapboxgl.accessToken,
        mapboxgl: mapboxgl
    });


    document.getElementById('geocoder').appendChild(geocoder.onAdd(map));
</script>

</body>
</html>