@extends('layouts.app')
@section('title') {{ trans('page.questions.title') }} @endsection
@section('hero')
<div class="content content-full">
  <div class="content-heading">
    <div class="d-flex justify-content-between align-items-sm-center">
      {{ trans('page.questions.title') }}
      <a href="{{ route('questions.index') }}" class="btn btn-sm btn-block-option text-danger">
        <i class="fa fa-xs fa-chevron-left me-1"></i>
        {{ trans('button.back') }}
      </a>
    </div>
    <nav class="breadcrumb push my-0">
      {{ Breadcrumbs::render('questions.create') }}
    </nav>
  </div>
</div>
@endsection
@section('content')
<div class="block block-rounded">
  <div class="block-header block-header-default">
    <h3 class="block-title">
      {{ trans('page.questions.create') }}
    </h3>
  </div>
  <div class="block-content block-content-full">

    <form action="{{ route('questions.store') }}" method="POST" onsubmit="return disableSubmitButton()">
      @csrf

      <div class="row justify-content-center">
        <div class="col-md-6">

          <div class="mb-4">
            <label for="lesson_id" class="form-label">{{ trans('Materi') }}</label>
            <span class="text-danger">*</span>
            <select name="lesson_id" id="lesson_id" class="js-select2 form-select @error('lesson_id') is-invalid @enderror" data-placeholder="{{ trans('Pilih Materi') }}" style="width: 100%;">
              <option></option>
              @foreach ($lessons as $item)
              <option value="{{ $item->id }}" @if (old('lesson_id')==$item->id) selected @endif>{{ $item->title }}</option>
              @endforeach
            </select>
            @error('lesson_id')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-4">
            <label for="title" class="form-label">{{ trans('Pilih Tingkat Kesulitan') }}</label>
            <span class="text-danger">*</span>
            <select type="text" class="form-select" name="title" id="title">
              @foreach ($difficulty as $item)
              <option value="{{ $item }}">{{ $item }}</option>
              @endforeach
            </select>
          </div>

          <div class="mb-4">
            <label class="form-label" for="question">{{ trans('Pertanyaan') }}</label>
            <span class="text-danger">*</span>
            <textarea name="question" id="js-ckeditor5-classic" class="form-control @error('question') is-invalid @enderror" placeholder="{{ __('Soal Pertanyaan') }}">{{ old('question') }}</textarea>
            @error('question')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-4">
            <label for="option_a" class="form-label">{{ trans('Opsi A') }}</label>
            <span class="text-danger">*</span>
            <input type="text" name="option_a" id="option_a" value="{{ old('option_a') }}" class="form-control @error('option_a') is-invalid @enderror" placeholder="{{ trans('Opsi A') }}">
            @error('option_a')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-4">
            <label for="option_b" class="form-label">{{ trans('Opsi B') }}</label>
            <span class="text-danger">*</span>
            <input type="text" name="option_b" id="option_b" value="{{ old('option_b') }}" class="form-control @error('option_b') is-invalid @enderror" placeholder="{{ trans('Opsi B') }}">
            @error('option_b')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-4">
            <label for="option_c" class="form-label">{{ trans('Opsi C') }}</label>
            <span class="text-danger">*</span>
            <input type="text" name="option_c" id="option_c" value="{{ old('option_c') }}" class="form-control @error('option_c') is-invalid @enderror" placeholder="{{ trans('Opsi C') }}">
            @error('option_c')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-4">
            <label for="option_d" class="form-label">{{ trans('Opsi D') }}</label>
            <span class="text-danger">*</span>
            <input type="text" name="option_d" id="option_d" value="{{ old('option_d') }}" class="form-control @error('option_d') is-invalid @enderror" placeholder="{{ trans('Opsi D') }}">
            @error('option_d')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-4">
            <label for="option_e" class="form-label">{{ trans('Opsi E') }}</label>
            <span class="text-danger">*</span>
            <input type="text" name="option_e" id="option_e" value="{{ old('option_e') }}" class="form-control @error('option_e') is-invalid @enderror" placeholder="{{ trans('Opsi E') }}">
            @error('option_e')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-4">
            <label for="correct_option" class="form-label">{{ trans('Jawaban Benar') }}</label>
            <span class="text-danger">*</span>
            <input type="text" name="correct_option" id="correct_option" value="{{ old('correct_option') }}" class="form-control @error('correct_option') is-invalid @enderror" placeholder="{{ trans('Jawaban Benar') }}">
            @error('correct_option')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <small class="text-muted my-1">
              <em>{{ trans('Mohon masukkan jawaban sesuai dengan pilihan atau opsi yang anda masukkan') }}</em>
            </small>
          </div>

          <div class="mb-4">
            <button type="submit" class="btn btn-primary w-100" id="submit-button">
              <i class="fa fa-fw fa-circle-check me-1"></i>
              {{ trans('button.create') }}
            </button>
          </div>

        </div>
      </div>

    </form>

  </div>
</div>
@endsection
@vite('resources/js/consoles/questions/input.js')
