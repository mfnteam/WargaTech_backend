<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;

#[Table(timestamps: false)]
#[Fillable(['track_name', 'station_passed', 'travel_time'])]
class LrtTrackway extends Model
{
    
}
