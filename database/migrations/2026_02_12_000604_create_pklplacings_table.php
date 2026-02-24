<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::create('pklplacings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade');
            $table->foreignId('location_id')->constrained('locations')->onDelete('cascade');
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('status', ['aktif', 'selesai', 'dibatalkan'])->default('aktif');
            $table->timestamps();
        });
    }
 public function down(): void
    {
        Schema::dropIfExists('pklplacings');
    }
};
