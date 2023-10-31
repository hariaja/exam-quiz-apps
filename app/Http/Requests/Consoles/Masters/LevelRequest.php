<?php

namespace App\Http\Requests\Consoles\Masters;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class LevelRequest extends FormRequest
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
      'name' => [
        'required', 'string', 'max:50',
        Rule::unique('levels', 'name')->ignore($this->level),
      ],
    ];
  }

  /**
   * Make a capital letter at the end of each word.
   */
  public function validationData()
  {
    $data = $this->all();
    $data['name'] = Str::title($data['name']);
    return $data;
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
      '*.max' => ':attribute terlalu panjang, maksimal :max karakter',
      '*.unique' => ':attribute sudah digunakan, silahkan pilih yang lain',
      '*.in' => ':attribute tidak sesuai dengan data yang sudah tersedia',
    ];
  }

  /**
   * Get custom attributes for validator errors.
   *
   */
  public function attributes(): array
  {
    return [
      'name' => 'Jenjang level',
    ];
  }
}
