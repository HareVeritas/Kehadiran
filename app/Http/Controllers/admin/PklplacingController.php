<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\pklplacing;
use App\Models\student;
use App\Models\location;
use Illuminate\Http\Request;

class PklplacingController extends Controller
{
    public function index(Request $request)
    {
        $query = pklplacing::with(['student', 'location']);

        if ($request->has('search')) {
            $query->whereHas('student', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%');
            })->orWhereHas('location', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%');
            });
        }

        $pklplacings = $query->latest()->paginate(10);

        return view('admin.pklplacings.index', compact('pklplacings'));
    }

    public function create()
    {
        $students = student::all();
        $locations = location::all();
        return view('admin.pklplacings.create', compact('students', 'locations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'location_id' => 'required|exists:locations,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'status' => 'required|in:active,completed,cancelled',
        ]);

        pklplacing::create($request->all());
        return redirect()->route('admin.pklplacings.index')->with('success', 'PKL Placing berhasil ditambahkan.');
    }

    public function edit(pklplacing $pklplacing)
    {
        $students = student::all();
        $locations = location::all();
        return view('admin.pklplacings.edit', compact('pklplacing', 'students', 'locations'));
    }

    public function update(Request $request, pklplacing $pklplacing)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'location_id' => 'required|exists:locations,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'status' => 'required|in:active,completed,cancelled',
        ]);

        $pklplacing->update($request->all());
        return redirect()->route('admin.pklplacings.index')->with('success', 'PKL Placing berhasil diperbarui.');
    }

    public function destroy(pklplacing $pklplacing)
    {
        $pklplacing->delete();
        return redirect()->route('admin.pklplacings.index')->with('success', 'PKL Placing berhasil dihapus.');
    }
}
