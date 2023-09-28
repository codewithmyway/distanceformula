
// Calculate Distance not Necessary only For Checking Purpose
        function calculateDistance(lat1, lng1, lat2, lng2) {
            var earthRadius = 6371; // in kilometers

            var dLat = degreesToRadians(lat2 - lat1);
            var dLng = degreesToRadians(lng2 - lng1);

            var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                    Math.cos(degreesToRadians(lat1)) * Math.cos(degreesToRadians(lat2)) *
                    Math.sin(dLng / 2) * Math.sin(dLng / 2);

            var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));

            var distance = earthRadius * c * 1000; // in meters

            return distance;   
  
        }
         var distance = calculateDistance(lat1, lng1, lat2, lng2);
        console.log('Distance:', distance);
        