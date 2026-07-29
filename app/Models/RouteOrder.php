<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;

#[Table(incrementing: true, timestamps: false)]
#[Fillable(['route_id', 'station_id', 'order', 'travel_time'])]
class RouteOrder extends Model
{
    public function Route() {
        return $this->belongsTo(TrainRoute::class, 'route_id');
    }

    public function Station() {
        return $this->belongsTo(TrainStation::class, 'station_id');
    }
}
