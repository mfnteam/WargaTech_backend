<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;

#[Table(incrementing: true, timestamps: true)]
#[Fillable(['route_id', 'departure'])]
class Bus extends Model
{
    public function BusRoute() {
        return $this->belongsTo(BusRoute::class, 'route_id');
    }
}
