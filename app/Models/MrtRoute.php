<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;

#[Table(incrementing: true, timestamps: true)]
#[Fillable(['station_id', 'train_id', 'order', 'travel_time'])]
class MrtRoute extends Model
{
    public function MrtStation() {
        return $this->belongsTo(MrtStation::class, 'station_id');
    }

    public function MrtTrain() {
        return $this->belongsTo(MrtTrains::class, 'train_id');
    }
}
