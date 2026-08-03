<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;

#[Table(incrementing: true, timestamps: true)]
#[Fillable(['departure', 'code'])]
#[Hidden(['created_at', 'updated_at'])]
class Train extends Model
{
    public function Route() {
        return $this->hasMany(TrainRoute::class, 'train_id', 'id');
    }
}
