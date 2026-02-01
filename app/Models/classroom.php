<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class classroom extends Model
{
    protected $fillable = ['class_name', 'academic_year_id'];

    public function academicYear() {
        return $this->belongsTo(academic_year::class);
    }

    public function students() {
        return $this->hasMany(student::class, 'class_id');
    }
    //
}
