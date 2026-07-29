<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;

#[Table(incrementing: true, timestamps: false)]
#[Fillable(['halte_awal', 'halte_akhir', 'code'])]
class BusRoute extends Model
{
    public function Bus() {
        return $this->hasMany(Bus::class, 'route_id', 'id');
    }
}
