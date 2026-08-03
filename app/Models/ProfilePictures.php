<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;

#[Table(incrementing: true, timestamps: false)]
#[Fillable(['user_id', 'img'])]
class ProfilePictures extends Model
{
    public function User() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
