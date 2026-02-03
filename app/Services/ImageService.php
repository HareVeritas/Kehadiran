<?php
namespace App\Services;

use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;

class ImageService
{
    /**
     * Kompres gambar dan kembalikan Path-nya (untuk disimpan di Server)
     */
    public function compressAndSave($file, $path = 'profiles', $quality = 60)
    {
        $fileName = time() . '_' . uniqid() . '.jpg';
        $fullPath = $path . '/' . $fileName;

        // Proses kompresi menggunakan Intervention Image
        $img = Image::make($file)->encode('jpg', $quality);

        // Simpan ke storage disk public
        Storage::disk('public')->put($fullPath, $img);

        return $fullPath;
    }

    /**
     * Ambil file dari storage dan konversi ke Base64
     */
    public function fileToBase64($path)
    {
        if (!$path || !Storage::disk('public')->exists($path)) {
            return null;
        }

        $file = Storage::disk('public')->get($path);
        $type = pathinfo(storage_path('app/public/' . $path), PATHINFO_EXTENSION);
        
        return 'data:image/' . $type . ';base64,' . base64_encode($file);
    }

    /**
     * Proses langsung dari file upload ke Base64 (Tanpa simpan ke disk)
     * Cocok untuk preview cepat atau response API instan
     */
    public function imageToBase64Direct($file, $quality = 50)
    {
        $img = Image::make($file)->encode('jpg', $quality);
        return 'data:image/jpeg;base64,' . base64_encode($img);
    }
}