<!doctype html>
<html>
<head>
<meta charset="utf-8">

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBTqVv8bnWtcApNQ7VCErEt8r2N5gPs5TM&callback=initMap" ></script>
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
<script>
var map,
    myCenter = new google.maps.LatLng(22.33,83.455),
    gridstyle = { strokeColor: 'yellow', strokeWeight: 1 };  
    grid = [],
    markers = []

 function initMap() {
var myLatlng = new google.maps.LatLng(23.553278,83.376868);
var mapOptions = {
  zoom: 6,
  center: myLatlng
}
  map=new google.maps.Map(document.getElementById('map'),mapProp);

  var gridsize = 0.031; //Grid size in degrees

  google.maps.event.addListener(map,'bounds_changed', function() {
      var gridline,
          gridlat,
          gridlon,
          n = map.getBounds().getNorthEast().lat(),
          s = map.getBounds().getSouthWest().lat(),
          e = map.getBounds().getNorthEast().lng(), 
          w = map.getBounds().getSouthWest().lng()

       // If a previous grid and markers are set, we remove them.
       if (grid.length > 0) {
          for (var i = 0; i < grid.length; i++) { grid[i].setMap(null);  }
        }     

        if (markers.length > 0)
        {
          for (var i = 0; i < markers.length; i++) { markers[i].setMap(null); }
        }

      var sgrid = Math.round(s/gridsize)*gridsize;
      var wgrid = Math.round(w/gridsize)*gridsize;

      // Here we create the grid.
      for (gridlat = sgrid; gridlat < n; gridlat = gridlat + gridsize)
         {
          var gridline = new google.maps.Polyline({
           path: [{lat: gridlat, lng: e}, {lat: gridlat, lng: w}],
           map: map
           });
           gridline.setOptions(gridstyle);
           grid.push(gridline);
        }

      for (gridlng = wgrid; gridlng < e; gridlng = gridlng + gridsize)
         {
          var gridline = new google.maps.Polyline({
           path: [{lat: n, lng: gridlng}, {lat: s, lng: gridlng}],
           map: map
           });
           gridline.setOptions(gridstyle);
           grid.push(gridline);
        }

     // Here we create the markers.    
    //  for (markerlat = sgrid+gridsize/2; markerlat < n; markerlat = markerlat + gridsize)
    //  {
    //    for (markerlng = wgrid+gridsize/2; markerlng < e; markerlng = markerlng + gridsize)
    //     {
    //       var markerposition = {lat: markerlat, lng: markerlng};
    //       var marker = new google.maps.Marker({ 
    //         position: markerposition,
    //         map: map
    //       });
    //       markers.push(marker);
    //    }
    //  }
  });
}
google.maps.event.addDomListener(window, 'load', initMap);
</script>
</head>
<body>
<div id="map" style="width:700px;height:00px;"></div>
</body>
</html>