<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class student extends Authenticatable
{
    use HasApiTokens;

    protected $fillable = [
        'nisn', 
        'name', 
        'password', 
        'profile_photo',
        'classroom_id',
        'device_quota'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Siswa terdaftar di satu kelas
    public function classroom(): BelongsTo
    {
        return $this->belongsTo(classroom::class, 'classroom_id');
    }

    // Riwayat penempatan PKL (bisa lebih dari satu kali selama sekolah)
    public function placements(): HasMany
    {
        return $this->hasMany(internship_placement::class);
    }

    // HELPER: Mengambil penempatan PKL yang aktif hari ini
    public function activePlacement(): HasOne
    {
        return $this->hasOne(internship_placement::class)
            ->whereDate('start_date', '<=', now())
            ->whereDate('end_date', '>=', now());
    }

    // Data kehadiran siswa
    public function attendances(): HasMany
    {
        return $this->hasMany(attendance::class);
    }
}
