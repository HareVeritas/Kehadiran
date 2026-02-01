<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\student;
use App\Models\attendance;
use App\Models\classroom;
use App\Models\location;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $today = now()->toDateString();

        $stats = [
            'total_students' => student::count(),
            'present_today'  => attendance::whereDate('date', $today)->where('status', 'present')->count(),
            'late_today'     => attendance::whereDate('date', $today)->where('status', 'late')->count(),
            'on_internship'  => student::has('activePlacement')->count(),
        ];

        // Ambil 5 aktivitas absen terbaru
        $recent_attendances = attendance::with('student.classroom')
            ->whereDate('date', $today)
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard.index', compact('stats', 'recent_attendances'));
    }
}
