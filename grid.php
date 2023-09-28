<?php
function gridPosition($lat1,$lng1,$lat2,$lng2){
    // $lat1=22;
    // $lng1=85;
    // $lat2=24;
    // $lng2=85;

    $x_base=$lat2-$lat1;
    $y_base=$lng2-$lng1;

    $x=$x_base*1000;//in Meter
    $y=$y_base*1000;//in Meter
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
echo gridPosition(22.269867047088898,83.42223639357839,22.268427398032415,83.42365259993761);

?>