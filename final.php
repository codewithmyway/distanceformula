<!DOCTYPE html>
<html>
<head>
    <title>Google Map Distance Calculation</title>
    <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
   <script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBTqVv8bnWtcApNQ7VCErEt8r2N5gPs5TM&callback=initMap">
    </script>
    <script>
       
        // Position Calculation
        const gridX = 0.175;
        const gridY = 0.202;

        function calculatePosition(lat1, lng1, lat2, lng2) {
            const gridSize = 15;
            const fixedlat = 22.269808716768612;
            const fixedlng = 83.42223102916036;

            var x_base = degreesToRadians(lat2 - lat1);
            var y_base = degreesToRadians(lng2 - lng1);
        

           
            var x = x_base * 1000 * 6371*(gridX); // in meters
            var y = y_base * 1000 *6371* (gridY); // in meters

            if (x_base == 0) {
                x = 0;
                y = y;
            }
            if (y_base == 0) {
                y = 0;
                x = x;
            }

            if (lat1 <= fixedlat && lat2 <= fixedlat) {
                console.log('X is less than fixed position ');
            }
            if (lng2 <= fixedlat && lng2 <= fixedlat) {
                console.log('Y is less than fixed position');
            }

            var position = { x: x, y: y };
            return position;
        }

        function degreesToRadians(degrees) {
            return degrees * (Math.PI / 180);
        }

        function calculateGrid(lat1, lng1, lat2, lng2, map) {
            // Create a rectangle overlay for the grid
            var rectangle = new google.maps.Rectangle({
                strokeColor: '#FF0000',
                strokeOpacity: 0.8,
                strokeWeight: 1,
                fillColor: '#FF0000',
                fillOpacity: 0.35,
                map: map,
                bounds: {
                    north: lat2,
                    south: lat1,
                    east: lng2,
                    west: lng1
                }
            });

            // Create grid lines
            var latStep = (lat2 - lat1) / (1 + Math.floor((lat2 - lat1) / gridX));
            var lngStep = (lng2 - lng1) / (1 + Math.floor((lng2 - lng1) / gridY));

            for (var lat = lat1 + latStep; lat < lat2; lat += latStep) {
                var lineCoordinates = [
                    { lat: lat, lng: lng1 },
                    { lat: lat, lng: lng2 }
                ];

                var line = new google.maps.Polyline({
                    path: lineCoordinates,
                    geodesic: true,
                    strokeColor: '#0000FF',
                    strokeOpacity: 0.5,
                    strokeWeight: 1,
                    map: map
                });
            }

            for (var lng = lng1 + lngStep; lng < lng2; lng += lngStep) {
                var lineCoordinates = [
                    { lat: lat1, lng: lng },
                    { lat: lat2, lng: lng }
                ];

                var line = new google.maps.Polyline({
                    path: lineCoordinates,
                    geodesic: true,
                    strokeColor: '#0000FF',
                    strokeOpacity: 0.5,
                    strokeWeight: 1,
                    map: map
                });
            }

            // Add SVG image overlay
            var imageBounds = {
                north: lat2,
                south: lat1,
                east: lng2,
                west: lng1
            };
            var image = 'newMap.svg';

            var overlay = new google.maps.GroundOverlay(image, imageBounds);
            overlay.setMap(map);
        }

        function initMap() {
            var lat1 =  22.268772418725423;
            var lng1 = 83.44647283423696;
            var lat2 = 22.26973797570908;     
            var lng2 = 83.44647283423696;

            var position = calculatePosition(lat1, lng1, lat2, lng2);
           

          
            console.log('Position:', position);

            

            // Center point of the map
            var myLatlng = new google.maps.LatLng(28.506845, 77.384942);
            var mapOptions = {
                zoom: 6,
                center: myLatlng
            };

            map = new google.maps.Map(document.getElementById("map"), mapOptions);

            var grid = calculateGrid(lat1, lng1, lat2, lng2, map);

//lng -x
//lat - y 

 const flightPlanCoordinates = [
    {  lng: 83.9790249590964, lat: 21.744202004983073},
    {  lng: 83.9790249590964, lat: 21.755302004983073}, // 1.234  KM
    {  lng: 83.9790249590964, lat: 21.724748134746648}, //2.16 KM
    {  lng: 83.9790249590964, lat: 21.774748134746648}, //3.379 KM
    {  lng: 83.9790249590964, lat: 21.784748134746648}, //4.509 KM
    {  lng: 83.9790249590964, lat: 21.794748134746648}, //5.62 KM
    {  lng: 83.9790249590964, lat: 21.804748134746648}, //8.955 KM 
    {  lng: 83.9790249590964, lat: 21.924748134746648},  //20.08 KM
    {  lng: 83.9790249590964, lat: 22.194748134746648},  //50.1 KM

    // { lat: -18.142, lng: 178.431 },
    // { lat: -27.467, lng: 153.027 },
  ];
  const flightPath = new google.maps.Polyline({
    path: flightPlanCoordinates,
    geodesic: true,
    strokeColor: "#FF0000",
    strokeOpacity: 1.0,
    strokeWeight: 2,
  });

  flightPath.setMap(map);
        }

        google.maps.event.addDomListener(window, 'load', initMap);
    </script>
</head>
<body>
    <div id="map"></div>
</body>
</html>
