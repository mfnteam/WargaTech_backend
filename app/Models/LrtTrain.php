<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;

#[Table(incrementing: true, timestamps: true)]
#[Fillable(['departure', 'code'])]
class LrtTrain extends Model
{
    public function LrtRoute() {
        return $this->hasMany(LrtRoute::class, 'train_id', 'id');
    }
}
