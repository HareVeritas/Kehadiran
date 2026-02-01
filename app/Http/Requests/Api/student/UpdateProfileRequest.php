<?php

namespace App\Http\Requests\Api\student;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
                'name'     => ['nullable', 'string', 'max:255'],
                'photo'    => ['nullable', 'string'], // String Base64
                'password' => ['nullable', 'string', 'min:6', 'confirmed'],
            ];
        }

        protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
        {
            throw new \Illuminate\Http\Exceptions\HttpResponseException(response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors'  => $validator->errors()
            ], 422));
        }
}
