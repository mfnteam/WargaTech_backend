<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['user_id', 'service_id', 'date', 'book_time', 'status'])]
#[Table(incrementing: true, timestamps: true)]
class Medical extends Model
{
    public function User() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function Service() {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
