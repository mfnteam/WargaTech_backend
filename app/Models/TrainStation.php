<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;

#[Table(incrementing: true, timestamps: false)]
#[Fillable(['name'])]
class TrainStation extends Model
{
    public function Order() {
        return $this->hasMany(RouteOrder::class, 'station_id', 'id');
    }
}
