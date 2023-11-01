<?php

namespace App\Http\Requests\Consoles\Masters;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class LessonRequest extends FormRequest
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
      'title' => [
        'required', 'string', 'max:50',
        Rule::unique('lessons', 'title')->ignore($this->lesson),
      ],
      'level_id' => 'required|exists:levels,id',
      'video_link' => 'required|url|regex:/^(https:\/\/www\.youtube\.com\/watch\?v=)[a-zA-Z0-9_-]{11}$/',
      'file' => 'required|mimes:jpg,png|max:3048',
      'description' => 'required|string',
      'status' => 'required',
    ];
  }

  /**
   * Make a capital letter at the end of each word.
   */
  public function validationData()
  {
    $data = $this->all();
    $data['title'] = Str::title($data['title']);
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
      '*.regex' => 'Format :attribute tidak sesuai, masukkan format: https://www.youtube.com/watch?v=XXXXXXXXXXX',
    ];
  }

  /**
   * Get custom attributes for validator errors.
   *
   */
  public function attributes(): array
  {
    return [
      'title' => 'Judul',
      'level_id' => 'Jenjang Level',
      'video_link' => 'Link Video',
      'file' => 'Banner',
      'description' => 'Konten',
      'status' => 'Status',
    ];
  }
}
