<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class pklplacing extends Model
{
    protected $fillable = ['student_id', 'location_id', 'start_date', 'end_date', 'status'];

    public function student(): BelongsTo
    {
        return $this->belongsTo(student::class);
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(location::class);
    }
}
