<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UpdateUserRequest extends FormRequest
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
        // Ambil ID user dari route (misal: admin/users/{user})
        $userId = $this->route('user')->id;

        return [
            'name'     => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'alpha_dash', 'max:255', 'unique:users,username,' . $userId],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $userId],
            'role'     => ['required', 'in:admin,teacher'],
            // Password 'nullable' agar tidak wajib diisi saat update
            'password' => ['nullable', 'confirmed', Password::defaults()],
        ];
    }
}
