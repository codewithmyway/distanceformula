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
        function initMap()
       {
          
            var lat1 = 28.506845;
            var lng1 = 77.384942;
            var lat2 = 29.503601;
            var lng2 = 77.384942;

           
            var position=calculatePosition(lat1, lng1, lat2, lng2,gridX,gridY);
            var distance = calculateDistance(lat1, lng1, lat2, lng2);
            var grid= calculateGrid(lat1, lng1, lat2, lng2);

            console.log('Distance:', distance);
            console.log('Position:', position);
           //center point of map
            var myLatlng = new google.maps.LatLng(23.553278,83.376868);
            var mapOptions = {
            zoom: 6,
            center: myLatlng
            }

 
            var map = new google.maps.Map(document.getElementById("map"), mapOptions);
             
         }
        // Calculate Distance not Neccessary only For Checking Purpose
        function calculateDistance(lat1, lng1, lat2, lng2) {
            var earthRadius = 6371; // in kilometers

            var dLat = degreesToRadians(lat2 - lat1);
            var dLng = degreesToRadians(lng2 - lng1);

            var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                    Math.cos(degreesToRadians(lat1)) * Math.cos(degreesToRadians(lat2)) *
                    Math.sin(dLng / 2) * Math.sin(dLng / 2);

            var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));

            var distance = earthRadius * c *1000;//in meter

            return distance;
        }
        //position Calculation
         // Create grid lines
         const gridX = 0.175;
         const gridY = 0.202;
         function calculatePosition(lat1, lng1, lat2, lng2)
         {
        const gridSize=5;
          const fixedlat=20.3;
          const fixedlng=77.7;
          var x_base = degreesToRadians(lat2 - lat1);
            var y_base = degreesToRadians(lng2 - lng1);
       

            var x = x_base*1000*(gridX);//in meter
            var y = y_base*1000*(gridY);// in meter

            if (x_base == 0) {
                x = 0;
                y = y_base;
            }
            if (y_base == 0) {
                y = 0;
                x = x_base;
            }
     
            if(lat1<=fixedlat && lat2<=fixedlat){
                console.log('X is less than fixed position(it seem negative)');

            }
            if(lng2<=fixedlat && lng2<=fixedlat){
                console.log('Y is less than fixed position');
            }
            var position={ x: x, y : y};
            return position;
         }
        
       function degreesToRadians(degrees) {
            return degrees * (Math.PI / 180);
        }
       
        function calculateGrid(lat1, lat2, lng1, lng2) {
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
    var gridX = 0.175;
    var gridY = 0.202;

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
    var image = 'map.svg';

    var overlay = new google.maps.GroundOverlay(image, imageBounds);
    overlay.setMap(map);
}
        google.maps.event.addDomListener(window, 'load', initMap);
    </script>


</head>
<body>
    
    <div id="map"></div>
</body>
</html>
