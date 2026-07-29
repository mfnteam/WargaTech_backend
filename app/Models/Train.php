<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;

#[Table(incrementing: true, timestamps: true)]
#[Fillable(['departure', 'code'])]
class Train extends Model
{
    public function Route() {
        return $this->hasMany(TrainRoute::class, 'train_id', 'id');
    }
}
