<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name'])]
#[Table(incrementing: true, timestamps: false)]
class MrtStation extends Model
{
    public function MrtRoute() {
        return $this->hasMany(MrtRoute::class, 'station_id', 'id');
    }
}
