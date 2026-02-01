<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class schedule extends Model
{
    protected $fillable = ['type', 'shift_start', 'shift_end', 'late_tolerance'];
    //
}
