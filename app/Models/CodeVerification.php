<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['user_id', 'code', 'expired_at'])]
class CodeVerification extends Model
{
    public function User() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
