<?php

namespace App\Http\Requests\Api\student;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class LoginStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }



    /**
     * Aturan validasi untuk Login Siswa.
     */
    public function rules(): array
    {
        return [
            'username'    => ['required', 'string', 'numeric'], // 'username' diisi dengan NISN (numeric)
            'password'    => ['required', 'string', 'min:6'],
            'device_name' => ['required', 'string'],
        ];
    }

    /**
     * Custom pesan error agar lebih user-friendly.
     */
    public function messages(): array
    {
        return [
            'username.required'    => 'NISN wajib diisi.',
            'username.numeric'     => 'NISN harus berupa angka.',
            'password.required'    => 'Password tidak boleh kosong.',
            'password.min'         => 'Password minimal 6 karakter.',
            'device_name.required' => 'Nama perangkat tidak terdeteksi.',
        ];
    }

    /**
     * Handle kegagalan validasi agar mengembalikan JSON (bukan redirect).
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Validasi gagal',
            'errors'  => $validator->errors()
        ], 422));
    }
}
