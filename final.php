<?php

function calculatePosition($lat1, $lng1, $lat2, $lng2) {
    $gridX = 0.175;
    $gridY = 0.202;
    $earthRadius = 6371; // in kilometers

    $fixedlat = 22.26980734137271;
    $fixedlng = 83.42222851266482;
    
    

    $x_base = deg2rad($lat2 - $lat1);
    $y_base = deg2rad($lng2 - $lng1);

    $a = sin($x_base / 2) * sin($x_base / 2) +cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *sin($y_base / 2) * sin($y_base / 2);

    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

    $distance = $earthRadius * $c; // in kilometers

    return $distance;
// $x_base=deg2rad($fixedlat-$lat1);
// $y_base = deg2rad($lat2 -$fixedlng);
// $a = sin($x_base / 2) * sin($x_base / 2) +cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *sin($y_base / 2) * sin($y_base / 2);
// $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
//  $distance_x = $earthRadius * $c; // in kilometers
// return $distance_x;

    // if($distance_x==0){



    // }

    // $x = $x_base * $earthRadius * $gridX * 1000; // in meters
    // $y = $y_base * $earthRadius * $gridY * 1000; // in meters

    // if ($x_base == 0) {
    //     $x = 0;
    //     $y = $y_base * $earthRadius * $gridY * 1000; // in meters
    // }
    // if ($y_base == 0) {
    //     $y = 0;
    //     $x = $x_base * $earthRadius * $gridX * 1000; // in meters
    // }

    // if ($lat1 <= $fixedlat && $lat2 <= $fixedlat) {
    //     echo 'X is less than the fixed position';
    // }
    // if ($lng1 <= $fixedlng && $lng2 <= $fixedlng) {
    //     echo 'Y is less than the fixed position';
    // }

    // $position = array('x' => $x, 'y' => $y);
    // return $position;
}

$lat1 = 22.26980734137271;
$lng1 = 83.42222851266482;

$lat2 = 22.26980734137271;
$lng2 = 83.42320467103276;

$distance = calculatePosition(22.26980734137271, 83.42222851266482, 22.26980734137271, 83.42271516788755);
// $position = calculatePosition($lat1, $lng1, $lat2, $lng2);

echo 'Position: ';
print_r($distance);

?>
