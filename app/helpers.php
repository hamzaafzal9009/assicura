<?php

if (!function_exists('cal_distance')) {
    function cal_distance($lat1, $lon1, $lat2, $lon2, $unit = 'M')
    {
        $lat1 = (float) $lat1;
        $lat2 = (float) $lat2;
        $lon1 = (float) $lon1;
        $lon2 = (float) $lon2;
        if (($lat1 == $lat2) && ($lon1 == $lon2)) {
            return 0;
        } else {
            // dd(gettype($lon2));
            $theta = $lon1 - $lon2;
            $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
            $dist = acos($dist);
            $dist = rad2deg($dist);
            $miles = $dist * 60 * 1.1515;
            $unit = strtoupper($unit);

            if ($unit == "K") {
                return ($miles * 1.609344);
            } else if ($unit == "N") {
                return ($miles * 0.8684);
            } else {
                return $miles;
            }
        }
    }
}