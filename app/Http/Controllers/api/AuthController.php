<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Api\student\LoginStudentRequest; 
use App\Models\Student;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    protected $imageService;
    public function __construct(\App\Services\ImageService $imageService)
    {
        $this->imageService = $imageService;
    }


    public function store(LoginStudentRequest $request)
    {
        $student = Student::where('nisn', $request->username)->first();

            // 1. Validasi Akun & Password
            if (!$student || !\Hash::check($request->password, $student->password)) {
                return response()->json([
                    'success' => false, 
                    'message' => 'NISN atau password salah.'
                ], 401);
            }

      // 2. Cek Jumlah Perangkat Aktif
            $activeTokens = $student->tokens()->count();
            
            // Batas maksimal 3 perangkat
            $maxDevices = 3;

            if ($activeTokens >= $maxDevices) {
                return response()->json([
                    'success' => false,
                    // Pesan sesuai permintaan Anda
                    'message' => "Maaf, Anda telah mencapai batas maksimal 3 perangkat. Silakan logout dari salah satu perangkat lama atau hubungi Admin untuk bantuan pindah perangkat.",
                    'data' => [
                        'current_devices' => $activeTokens,
                        'limit' => $maxDevices
                    ]
                ], 403);
            }

            // 3. Buat Token Baru jika kuota masih ada
            $token = $student->createToken($request->device_name)->plainTextToken;
            // 3. Response Ringan (Kirim URL saja, biarkan Flutter yang mengolah ke Base64 jika perlu)
            return response()->json([
                'success' => true,
                'message' => 'Login Berhasil',
                'data' => [
                    'token'   => $student->createToken($request->device_name)->plainTextToken,
                    'student' => [
                        'name'  => $student->name,
                        'nisn'  => $student->nisn,
                        'device_info' => "Perangkat ke-" . ($activeTokens + 1) . " dari " . $maxDevices,
                        'photo' => $student->profile_photo ? asset('storage/' . $student->profile_photo) : null,
                    ]
                ]
            ]);
    }

    public function show (Request $request){

        // Mengambil data student yang sedang login berdasarkan token
        $student = $request->user();

        // Memastikan relasi classroom ikut terbawa jika diperlukan di mobile
        $student->load('classroom');

        return response()->json([
            'success' => true,
            'message' => 'Data profil berhasil diambil',
            'data'    => [
                'student' => [
                    'id'           => $student->id,
                    'name'         => $student->name,
                    'nisn'         => $student->nisn,
                    'photo_url'    => $student->profile_photo ? asset('storage/' . $student->profile_photo) : null,
                    'classroom'    => $student->classroom ? $student->classroom->class_name : 'Tidak terdaftar',
                    'device_quota' => $student->device_quota,
                    'joined_at'    => $student->created_at->format('d M Y'),
                ]
            ]
        ]);


    }

    public function update(Request $request)
    {
        $student = $request->user();

        // 1. Logika Update Nama (Hanya jika ada input 'name')
        if ($request->has('name') && $request->name != null) {
            $student->update([
                'name' => $request->name
            ]);
        }

        // 2. Logika Update Foto (Hanya jika ada file 'photo')
        if ($request->hasFile('photo')) {
            // Hapus foto lama dari storage agar tidak memenuhi server (opsional)
            if ($student->profile_photo) {
                \Storage::disk('public')->delete($student->profile_photo);
            }

            $path = $this->imageService->compressAndSave($request->file('photo'));
            $student->update(['profile_photo' => $path]);
        }

        // 3. Ambil data terbaru untuk dikirim balik ke Flutter
        $base64 = $this->imageService->fileToBase64($student->profile_photo);

        return response()->json([
            'success' => true,
            'message' => 'Profil berhasil diperbarui',
            'data' => [
                'name' => $student->name, // Kirim nama terbaru
                'photo_base64' => $base64
            ]
        ]);
    }

    public function destroy(Request $request)
    {
        // Menghapus token yang digunakan saat ini
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'success' => true,
            'message' => 'Berhasil logout. Jatah perangkat telah dilepaskan.',
            'data'    => null
        ]);
    }


}
