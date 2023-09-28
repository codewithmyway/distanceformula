<?php

function calculatePosition($lat1, $lng1, $lat2, $lng2) {
    $gridX = 0.175;
    $gridY = 0.202;
    $earthRadius = 6371; // in kilometers

    $fixedlat = 22.269808716768612;
    $fixedlng = 83.42223102916036;

    $x_base = deg2rad($lat2 - $lat1);
    $y_base = deg2rad($lng2 - $lng1);

    $x = $x_base * $earthRadius * $gridX * 1000; // in meters
    $y = $y_base * $earthRadius * $gridY * 1000; // in meters

    if ($x_base == 0) {
        $x = 0;
        $y = $y_base * $earthRadius * $gridY * 1000; // in meters
    }
    if ($y_base == 0) {
        $y = 0;
        $x = $x_base * $earthRadius * $gridX * 1000; // in meters
    }

    if ($lat1 <= $fixedlat && $lat2 <= $fixedlat) {
        echo 'X is less than the fixed position';
    }
    if ($lng1 <= $fixedlng && $lng2 <= $fixedlng) {
        echo 'Y is less than the fixed position';
    }

    $position = array('x' => $x, 'y' => $y);
    return $position;
}

$lat1 = 28.506845;
$lng1 = 77.384942;
$lat2 = 29.503601;
$lng2 = 77.584942;

$position = calculatePosition($lat1, $lng1, $lat2, $lng2);

echo 'Position: ';
print_r($position);

?>
