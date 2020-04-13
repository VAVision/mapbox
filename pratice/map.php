<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Locate the user</title>
<meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no" />
<script src="https://api.mapbox.com/mapbox-gl-js/v1.9.1/mapbox-gl.js"></script>
<link href="https://api.mapbox.com/mapbox-gl-js/v1.9.1/mapbox-gl.css" rel="stylesheet" />
<style>
	body { margin: 0; padding: 0; }
	#map { position: absolute; top: 0; bottom: 0; width: 100%; }
</style>
</head>
<body>
<div id="map"></div>
<?php
echo "<input type='hidden' id='lng' name='lng' value=".$_GET['lng']."><input type='hidden' id='city' name='city' value=".$_GET['city']."><input type='hidden' id='sub_city' name='sub_city' value=".$_GET['sub_city']."><input type='hidden' id='shop_name' name='shop_name' value=".$_GET['shop_name']."><input type='hidden' id='description' name='description' value=".$_GET['description']."><input type='hidden' id='contact_number' name='contact_number' value=".$_GET['contact_number']."> <input type='hidden' id='lat' name='lat' value=".$_GET['lat'].">";
?>
<script>
   	var lng = document.getElementById('lng').value;
   	var lat = document.getElementById('lat').value;
   	var city = document.getElementById('city').value;
   	var sub_city = document.getElementById('sub_city').value;
   	var shop_name = document.getElementById('shop_name').value;
   	var description = document.getElementById('description').value;
   	var contact_number = document.getElementById('contact_number').value;
	mapboxgl.accessToken = 'pk.eyJ1IjoibmFkYXJhbiIsImEiOiJjazhyNDA4OHcwYXZqM29uMGRncGU3NTRuIn0.7vFNeJjjGR-tE-Z5vO4iyw';
    var map = new mapboxgl.Map({
        container: 'map', // container id
        style: 'mapbox://styles/mapbox/streets-v11',
        center: [lat,lng], // starting position
        zoom: 15 // starting zoom
    });
    var popup = new mapboxgl.Popup({ closeOnClick: false })
		.setLngLat([lat,lng])
		.setHTML('<h3>'+shop_name+'</h3><p>'+description+'</p>')
		.addTo(map);
    // Add geolocate control to the map.
    map.addControl(
        new mapboxgl.GeolocateControl({
            positionOptions: {
                enableHighAccuracy: true
            },
            trackUserLocation: true
        })
    );
</script>

</body>
</html>