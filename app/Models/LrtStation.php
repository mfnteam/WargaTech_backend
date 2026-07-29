<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;

#[Table(incrementing: true, timestamps: false)]
#[Fillable(['name'])]
class LrtStation extends Model
{
    public function LrtRoute() {
        return $this->hasMany(LrtRoute::class, 'station_id', 'id');
    }
}
