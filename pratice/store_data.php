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
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.4.2/mapbox-gl-geocoder.min.js"></script>
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.4.2/mapbox-gl-geocoder.css" type="text/css" />
    <!-- Promise polyfill script required to use Mapbox GL Geocoder in IE 11 -->
    <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.min.js"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
        }
        
        #map {
            position: absolute;
            top: 0;
            bottom: 0;
            width: 100%;
        }
        
        .header {
            overflow: hidden;
            background-color: #f1f1f1;
            padding: 20px 10px;
            margin-bottom: 50px;
        }
        /* The Modal (background) */
        
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
            padding-top: 60px;
        }
        /* Modal Content/Box */
        
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto 15% auto;
            /* 5% from the top, 15% from the bottom and centered */
            border: 1px solid #888;
            width: 80%;
            /* Could be more or less, depending on screen size */
        }
        /* The Close Button (x) */
        
        .close {
            position: absolute;
            left: 25px;
            top: 0;
            color: #000;
            font-size: 35px;
            font-weight: bold;
        }
        
        .close:hover,
        .close:focus {
            color: red;
            cursor: pointer;
        }
        /* Add Zoom Animation */
        
        .animate {
            -webkit-animation: animatezoom 0.6s;
            animation: animatezoom 0.6s
        }
        
        @-webkit-keyframes animatezoom {
            from {
                -webkit-transform: scale(0)
            }
            to {
                -webkit-transform: scale(1)
            }
        }
        
        @keyframes animatezoom {
            from {
                transform: scale(0)
            }
            to {
                transform: scale(1)
            }
        }
        /* Change styles for span and cancel button on extra small screens */
        
        @media screen and (max-width: 300px) {
            span.psw {
                display: block;
                float: none;
            }
            .cancelbtn {
                width: 100%;
            }
        }
        
        .container {
            padding: 16px;
        }
        
        .geocoder {
            position: absolute;
            z-index: 1;
            width: 70%;
            left: 100%;
            margin-left: -27%;
            top: 10px;
        }
        
        .mapboxgl-ctrl-geocoder {
            min-width: 100%;
        }
        
        #map {
            margin-top: 45px;
            width: 100%;
            height: 70%;
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
        
        .modal-content {
            width: 70%;
            height: 70%;
        }
    </style>
</head>
<body>
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.4.2/mapbox-gl-geocoder.min.js"></script>
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.4.2/mapbox-gl-geocoder.css" type="text/css" />
    <div class="header">
        <h1 align="center">Add User Detail</h1>
        <div align="left">
            <a style="font-size: 18px; padding-left:12px" href="http://localhost:8000/pratice/admin_page.php">
                << Back</a>
        </div>
    </div>
    <form action="http://localhost:8000/pratice/insert_data.php" method="post" class="container">
        Shop Name :
        <input type="text" class="form-control" placeholder="Shop Name" name="shop_name">
        <br> City :
        <input type="text" class="form-control" placeholder="City" name="city">
        <br> Sub City :
        <input type="text" class="form-control" placeholder="Sub City" name="sub_city">
        <br> Contact Number :
        <input type="text" class="form-control" placeholder="Contact Number" name="contact_number">
        <br> Location Lat :
        <label id="lat" name="lat">--</label> And Lng :
        <label id="lng" name="lng">--</label>
        <div align="right"><a onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Pick Location</a></div>
        <br>
        <div class="form-group">
            <label for="description">Description : </label>
            <textarea class="form-control" rows="5" id="description"  name="description"></textarea>
        </div>
        <input type="submit" value="Submit">
    </form>
    <div id="id01" class="modal">
        <div class="modal-content animate">
            <div class="imgcontainer">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                <div style="width: 100%;height: 100%">
                    <div id="map"></div>
                    <div id="geocoder" class="geocoder"></div>
                    <pre id="info"></pre>
                </div>
                <!-- <img src="img_avatar2.png" alt="Avatar" class="avatar"> -->
                <br>
                <br>
            </div>

            <div class="container">

            </div>
        </div>
    </div>
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
        var geocoder = new MapboxGeocoder({
            accessToken: mapboxgl.accessToken,
            mapboxgl: mapboxgl
        });

        document.getElementById('geocoder').appendChild(geocoder.onAdd(map));
        // Get the modal
        var modal = document.getElementById('id01');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
        map.on('click', function(e) {
            var lngLat = JSON.stringify(e.lngLat.wrap());
            lngLat = JSON.parse(lngLat);
            var lng = lngLat.lng;
            var lat = lngLat.lat;
            $('#lat').text(lat);
            $('#lng').text(lng);
            modal.style.display = "none";
        });
    </script>
</body>
</html>