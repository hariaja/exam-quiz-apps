<?php

namespace App\Http\Requests\Consoles\Exams;

use App\Helpers\Enums\DifficultyType;
use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
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
    $difficultyValidation = DifficultyType::toValidation();

    return [
      'title' => "required|string|{$difficultyValidation}",
      'lesson_id' => 'required|exists:lessons,id',
      'question' => 'required|string',
      'option_a' => 'required|string',
      'option_b' => 'required|string',
      'option_c' => 'required|string',
      'option_d' => 'required|string',
      'option_e' => 'required|string',
      'correct_option' => 'required|string',
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
      'title' => 'Tingkat Kesulitan',
      'lesson_id' => 'Materi Pembelajaran',
      'question' => 'Pertanyaan',
      'option_a' => 'Opsi A',
      'option_b' => 'Opsi B',
      'option_c' => 'Opsi C',
      'option_d' => 'Opsi D',
      'option_e' => 'Opsi E',
      'correct_option' => 'Jawaban Benar',
    ];
  }
}
