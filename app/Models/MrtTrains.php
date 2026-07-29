<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;

#[Table(incrementing: true, timestamps: true)]
#[Fillable('departure', 'code')]
class MrtTrains extends Model
{
    public function MrtRoute() {
        return $this->hasMany(MrtRoute::class, 'train_id', 'id');
    }
}
