<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['img_url', 'report_id'])]
#[Table(incrementing: true, timestamps: false)]
class Picture extends Model
{
    public function Report() {
        return $this->belongsTo(Report::class, 'report_id');
    }
}
