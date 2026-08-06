<?php

use App\Models\MrtRoute;
use App\Models\MrtStation;
use App\Models\MrtTrains;

if(!function_exists('route_to_bh')) {
    function route_to_bh($trainId) {
        $station = MrtStation::get();

        for($i = 1; $i <= count($station); $i++) {
            if($i === 1) {
                MrtRoute::create([
                'train_id' => $trainId->id,
                'station_id' => $i,
                'travel_time' => 0,
                'order' => $i
            ]);
            } else {
                MrtRoute::create([
                'train_id' => $trainId->id,
                'station_id' => $i,
                'travel_time' => 3,
                'order' => $i
            ]);
            }
        }
    }
}

if(!function_exists('route_to_lb')) {
    function route_to_lb($trainId, $statId) {
        for($st = 1; $st <=count($statId); $st++) {
            if($st === 1) {
            MrtRoute::create([
                'train_id' => $trainId->id,
                'station_id' => $statId[$st - 1],
                'travel_time' => 0,
                'order' => $st
            ]);
            } else {
                MrtRoute::create([
                'train_id' => $trainId->id,
                'station_id' => $statId[$st - 1],
                'travel_time' => 3,
                'order' => $st
            ]);
            }
        }
    }
}