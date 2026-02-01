<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'     => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'alpha_dash', 'max:255', 'unique:users,username'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'role'     => ['required', 'in:admin,teacher'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ];
    }

    public function messages(): array
    {
        return [
            'username.unique' => 'Username ini sudah digunakan oleh akun lain.',
            'email.unique'    => 'Alamat email ini sudah terdaftar.',
            'role.in'         => 'Role yang dipilih harus Admin atau Guru.',
        ];
    }
}
