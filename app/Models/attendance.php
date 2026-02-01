<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class attendance extends Model
{
    protected $fillable = [
        'student_id', 
        'date', 
        'check_in', 
        'check_out', 
        'latitude_in', 
        'longitude_in', 
        'latitude_out', 
        'longitude_out', 
        'status',
        'is_within_radius',
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(student::class);
    }
    //
}
