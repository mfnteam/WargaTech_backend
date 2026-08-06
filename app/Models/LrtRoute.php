<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;

#[Table(incrementing: true, timestamps: true)]
#[Fillable(['train_id', 'station_id', 'order', 'travel_time'])]
#[Hidden(['created_at', 'updated_at'])]
class LrtRoute extends Model
{
    public function LrtTrain() {
        return $this->belongsTo(LrtTrain::class, 'train_id');
    }

    public function LrtStation() {
        return $this->belongsTo(LrtStation::class, 'station_id');
    }
}
