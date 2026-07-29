<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;

#[Table(incrementing: true, timestamps: false)]
#[Fillable(['train_id', 'name', 'direction'])]
class TrainRoute extends Model
{
    public function Train() {
        return $this->belongsTo(Train::class, 'train_id');
    }

    public function Order() {
        return $this->hasMany(RouteOrder::class, 'route_id', 'id');
    }
}
