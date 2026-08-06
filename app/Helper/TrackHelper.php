<?php

use App\Models\LrtRoute;
use App\Models\RouteOrder;

if (!function_exists('track_maker')) {
    function track_maker($track, $route)
    {
        $awalakhir_track = explode(',', $track->station_passed);
        $awalakhir_time = explode(',', $track->travel_time);

        for($i = 1; $i <= count($awalakhir_track); $i++) {
        $index = $i - 1;
            RouteOrder::create([
                'route_id' => $route->id,
                'station_id' => intval($awalakhir_track[$index]),
                'travel_time' => intval($awalakhir_time[$index]),
                'order' => $i
            ]);
        }
    }
}


if(!function_exists('reverse_track_maker')) {
    function reverse_track_maker($track, $route) {
        $awalakhir_track = array_reverse(explode(',', $track->station_passed));
        $awalakhir_time = array_reverse(explode(',', $track->travel_time));
        array_pop($awalakhir_time);
        array_unshift($awalakhir_time, '0');
                
        for($i = 1; $i <= count($awalakhir_track); $i++) {
        $index = $i - 1;
            RouteOrder::create([
                'route_id' => $route->id,
                'station_id' => intval($awalakhir_track[$index]),
                'travel_time' => intval($awalakhir_time[$index]),
                'order' => $i
            ]);
        }
    }
}


//lrt
if (!function_exists('lrt_track_maker')) {
    function lrt_track_maker($track, $train)
    {
        $awalakhir_track = explode(',', $track->station_passed);
        $awalakhir_time = explode(',', $track->travel_time);

        for($i = 1; $i <= count($awalakhir_track); $i++) {
        $index = $i - 1;
            LrtRoute::create([
                'train_id' => $train->id,
                'station_id' => intval($awalakhir_track[$index]),
                'travel_time' => intval($awalakhir_time[$index]),
                'order' => $i
            ]);
        }
    }
}


if(!function_exists('lrt_reverse_track_maker')) {
    function lrt_reverse_track_maker($track, $train) {
        $awalakhir_track = array_reverse(explode(',', $track->station_passed));
        $awalakhir_time = array_reverse(explode(',', $track->travel_time));
        array_pop($awalakhir_time);
        array_unshift($awalakhir_time, '0');
                
        for($i = 1; $i <= count($awalakhir_track); $i++) {
        $index = $i - 1;
            LrtRoute::create([
                'train_id' => $train->id,
                'station_id' => intval($awalakhir_track[$index]),
                'travel_time' => intval($awalakhir_time[$index]),
                'order' => $i
            ]);
        }
    }
}