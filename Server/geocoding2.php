<?php

$db_host = 'localhost';
$db_user = 'root';
$db_pwd = 'dYn6fGF0';
$database = 'Locations';
$table = 'Location';

if (!mysql_connect($db_host, $db_user, $db_pwd))
    die("Can't connect to database");

if (!mysql_select_db($database))
    die("Can't select database");

//Set default location
$lat_d = 40.709;
$long_d = -74.007;

// mimic a result array from MySQL
$result = array(array('latitude'=>$lat_d,'longitude'=>$long_d));
?>
<!doctype html>
<html>
    <head>
        <script type="text/javascript" src="http://maps.googleapis.com/maps/api
/js?sensor=false"></script>
        <script type="text/javascript">
        var map;
        function initialize() {
            // Set static latitude, longitude value
            var latlng = new google.maps.LatLng(<?php echo $lat_d; ?>, <?php echo $long_d; ?>);
            // Set map options
            var myOptions = {
                zoom: 5,
                center: latlng,
                panControl: true,
                zoomControl: true,
                scaleControl: true,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }
            // Create map object with options
            map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
        <?php
            // uncomment the 2 lines below to get real data from the db
             $result = mysql_query("SELECT latitude,longitude FROM Location");
             while ($row = mysql_fetch_array($result))
            	 echo "addMarker(new google.maps.LatLng(".$row['latitude'].", ".$row['longitude']."), map);";
        ?>
        }
        function addMarker(latLng, map) {
            var marker = new google.maps.Marker({
                position: latLng,
                map: map,
                draggable: false,
                animation: google.maps.Animation.DROP
            });

            return marker;
        }
        </script>
    </head>
    <body onload="initialize()">
        <div style="float:left; position:relative; width:550px; border:0px #000 solid;">
            <div id="map_canvas" style="width:550px;height:400px;border:solid black 1px;"></div>
        </div>
    </body>
</html>
