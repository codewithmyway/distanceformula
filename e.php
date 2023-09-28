<?php
function calculateDistance($lat1, $lng1, $lat2, $lng2) {
    $earthRadius = 6371; // in kilometers

    $dLat = deg2rad($lat2 - $lat1);
    $dLng = deg2rad($lng2 - $lng1);

    $a = sin($dLat / 2) * sin($dLat / 2) +
        cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
        sin($dLng / 2) * sin($dLng / 2);

    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

    $distance = $earthRadius * $c; // in kilometers

    return $distance;
}
$distance = calculateDistance(22.26980734137271, 83.42222851266482, 22.26980734137271, 83.42271516788755);
echo $distance;
?>