<?php

namespace App\Http\Controllers\guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\student;
use App\Models\attendance;
use App\Models\classroom;
use App\Models\location;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $today = now()->toDateString();
        
        // 1. Logika untuk Progress Bar Mingguan (Dinamis)
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
        $weeklyStats = [];
        $totalStudents = student::count() ?: 1; // Hindari pembagian dengan nol

        foreach ($days as $day) {
            $date = now()->startOfWeek()->modify($day)->toDateString();
            $presentCount = attendance::whereDate('date', $date)
                                        ->where('status', 'present')
                                        ->count();
            
            $weeklyStats[] = [
                'day' => $day,
                'percentage' => round(($presentCount / $totalStudents) * 100)
            ];
        }

        // 2. Logika Filter & Pencarian untuk Log Kehadiran
        $query = attendance::with('student.classroom');

        if ($request->filled('search')) {
            $query->whereHas('student', function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $recent_attendances = $query->whereDate('date', $today)
                                    ->latest()
                                    ->paginate(10)
                                    ->withQueryString();

        return view('teacher.dashboard.index', compact('weeklyStats', 'recent_attendances', 'totalStudents'));
    }
    //
}
