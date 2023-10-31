<?php

namespace App\Http\Requests\Consoles\Settings;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
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
      'current_password' => ['required', function ($attiribute, $value, $fail) {
        if (!Hash::check($value, me()->password)) {
          return $fail(trans(':attribute salah'));
        }
      }],
      'password' => [
        'required',
        'string',
        'min:8',
        'confirmed',
        Password::defaults()
      ],
    ];
  }

  /**
   * Get the error messages for the defined validation rules.
   *
   */
  public function messages(): array
  {
    return [
      '*.required' => ':attribute tidak boleh dikosongkan',
      '*.string' => ':attribute tidak valid, masukkan yang benar',
      '*.min' => ':attribute terlalu pendek, minimal :min karakter',
      '*.confirmed' => ':attribute tidak sama dengan Kata Sandi Konfimasi',
    ];
  }

  /**
   * Get custom attributes for validator errors.
   *
   */
  public function attributes(): array
  {
    return [
      'current_password' => 'Kata Sandi Saat Ini',
      'password' => 'Kata Sandi Baru'
    ];
  }
}
