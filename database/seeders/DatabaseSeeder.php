<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
<<<<<<< HEAD
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
=======
        // 1. Create Academic Year
        $ay = \App\Models\academic_year::create([
            'name' => '2025/2026',
            'is_active' => true,
        ]);

        // 2. Create Classroom
        $classroom = \App\Models\classroom::create([
            'class_name' => 'XII RPL 1',
            'academic_year_id' => $ay->id,
        ]);

        // 3. Create Admin
        \App\Models\User::create([
            'name' => 'Super Admin',
            'username' => 'admin',
            'email' => 'admin@smk.sch.id',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        // 4. Create Teacher
        \App\Models\User::create([
            'name' => 'Budi Santoso, S.Kom',
            'username' => 'guru_budi',
            'email' => 'budi@smk.sch.id',
            'password' => bcrypt('password'),
            'role' => 'teacher',
        ]);

        // 5. Create Student (for Mobile Test)
        \App\Models\student::create([
            'nisn' => '12345678',
            'name' => 'Siswa Percobaan',
            'password' => bcrypt('password'),
            'classroom_id' => $classroom->id,
>>>>>>> 2d80d6bd139d07824956b75836a66502698209b8
        ]);
    }
}
