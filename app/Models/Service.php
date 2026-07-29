<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;

#[Table(incrementing: true, timestamps: false)]
#[Fillable(['doctor_name', 'type', 'location', 'open_time', 'close_time'])]
class Service extends Model
{
    public function Medical() {
        return $this->hasMany(Medical::class, 'service_id', 'id');
    }
}
