<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class internship_placement extends Model
{
    protected $fillable = ['student_id', 'location_id', 'start_date', 'end_date'];

    public function student(): BelongsTo
    {
        return $this->belongsTo(student::class);
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(location::class);
    }
    //
}
