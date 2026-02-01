<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class academic_year extends Model
{
    protected $fillable = ['name', 'is_active'];

    // Satu tahun ajaran memiliki banyak kelas
    public function classes(): HasMany
    {
        return $this->hasMany(classroom::class, 'academic_year_id');
    }
    //
}
