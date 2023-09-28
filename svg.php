<!doctype html>
<html>
<head>
    
    <!-- Load the Google Maps JavaScript API -->
    <script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBTqVv8bnWtcApNQ7VCErEt8r2N5gPs5TM&callback=initMap">
    </script>
<meta charset="utf-8">
<svg xmlns="http://www.w3.org/2000/svg" width="400" height="400">
  <circle id="point1" cx="100" cy="100" r="5" fill="red" />
  <circle id="point2" cx="200" cy="200" r="5" fill="blue" />
</svg>

<!-- <script>
  var point1 = document.getElementById('point1');
  var point2 = document.getElementById('point2');
  
  var x1 = parseFloat(point1.getAttribute('cx'));
  var y1 = parseFloat(point1.getAttribute('cy'));
  var x2 = parseFloat(point2.getAttribute('cx'));
  var y2 = parseFloat(point2.getAttribute('cy'));
  
  var distance = Math.sqrt(Math.pow(x2 - x1, 2) + Math.pow(y2 - y1, 2));
  
  console.log('Distance:', distance);
</script> -->

<script>
    function calculateDistance(lat1, lon1, lat2, lon2) {
      var R = 6371; // Radius of the Earth in kilometers
      var dLat = toRadians(lat2 - lat1);
      var dLon = toRadians(lon2 - lon1);
      var a =
        Math.sin(dLat / 2) * Math.sin(dLat / 2) +
        Math.cos(toRadians(lat1)) * Math.cos(toRadians(lat2)) *
        Math.sin(dLon / 2) * Math.sin(dLon / 2);
      var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
      var distance = R * c;
      return distance;
    }
    
    function toRadians(degrees) {
      return degrees * (Math.PI / 180);
    }
    
    var lat1 = 22;
    var lon1 = 85;
    var lat2 = 24;
    var lon2 = 85;
    
    var distance = calculateDistance(lat1, lon1, lat2, lon2);
    
    console.log('Distance:', distance);
  </script>

<?php


function gridPosition($lat1,$lng1,$lat2,$lng2){
    // $lat1=22;
    // $lng1=85;
    // $lat2=24;
    // $lng2=85;

    $x_base=$lat2-$lat1;
    $y_base=$lng2-$lng1;

    $x=$x_base;
    $y=$y_base;
    if($x_base==0){
        $x==0;
        $y=$y_base;
    }
    if($y_base==0){
        $y==0;
        $x=$x_base;
    }
return "x-axis is= ".$x."<br>y-axis is= ".$y;

}
?>
</head>
<body>
<div id="map" style="width:700px;height:00px;"></div>
</body>
</html>