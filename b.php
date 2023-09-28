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
  function initMap() {
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 11,
    center: { lat: 41.876, lng: -87.624 },
  });
  const ctaLayer = new google.maps.KmlLayer({
    url: "https://googlearchive.github.io/js-v2-samples/ggeoxml/cta.kml",
    map: map,
  });
}

window.initMap = initMap;
</script>
</head>
<body>
    <div id="map"></div>
</body>
</html>
