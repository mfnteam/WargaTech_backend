<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['user_id', 'type', 'location', 'description', 'status'])]
#[Table(incrementing: true, timestamps: true)]
class Report extends Model
{
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function Picture() {
        return $this->hasMany(Picture::class, 'report_id', 'id');
    }
}
