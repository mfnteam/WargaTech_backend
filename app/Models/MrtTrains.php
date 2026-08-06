<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;

#[Table(incrementing: true, timestamps: true)]
#[Fillable('departure', 'code', 'destination')]
#[Hidden(['created_at', 'updated_at'])]
class MrtTrains extends Model
{
    public function MrtRoute() {
        return $this->hasMany(MrtRoute::class, 'train_id', 'id');
    }
}
