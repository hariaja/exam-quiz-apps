@extends('students.layouts.main')
@section('title', trans('page.results.title'))
@section('hero')
<div class="bg-body-extra-light">
  <div class="content text-center">
    <div class="pt-5 pb-3">
      <h1 class="h2 fw-bold mb-3">{{ trans('page.results.title') }}</h1>
      <h2 class="h5 fw-medium text-muted">
        <a href="{{ route('students.lessons.index') }}" class="btn btn-sm btn-danger">
          <i class="fas fa-arrow-left me-1"></i>
          {{ trans('button.back') }}
        </a>
      </h2>
    </div>
  </div>
</div>
@endsection
@section('content')
<div class="block block-rounded">
  <div class="block-header block-header-default">
    <h3 class="block-title">
      {{ trans('page.results.create') }}
    </h3>
  </div>
  <div class="block-content">

    <div class="row">
      <div class="col-md-6">
        <ul class="list-group push">
          <li class="list-group-item d-flex justify-content-between align-items-center">
            {{ trans('Judul Materi') }}
            <span class="fw-semibold">{{ $lesson->title }}</span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            {{ trans('Kategori') }}
            <span class="fw-semibold">{{ $lesson->category->name }}</span>
          </li>
        </ul>
      </div>
    </div>

    <form action="{{ route('students.results.store') }}" method="POST" onsubmit="return disableSubmitButton()">
      @csrf

      <div class="row justify-content-center">
        @forelse ($lesson->questions as $question)
        <div class="col-md-6">
          <ul class="list-group push">
            <li class="list-group-item">{!! $question->question !!}</li>
          </ul>

          <div class="mb-4">
            <label class="form-label">{{ trans('Pilih Jawaban') }}</label>
            <div class="space-y-2">

              <div class="form-check">
                <input class="form-check-input" type="radio" id="question-{{ $question->uuid }}-a" name="answers[{{ $question->id }}]" value="{{ $question->option_a }}">
                <label class="form-check-label" for="question-{{ $question->uuid }}-a">{{ "A. {$question->option_a}" }}</label>
              </div>

              <div class="form-check">
                <input class="form-check-input" type="radio" id="question-{{ $question->uuid }}-b" name="answers[{{ $question->id }}]" value="{{ $question->option_b }}">
                <label class="form-check-label" for="question-{{ $question->uuid }}-b">{{ "B. {$question->option_b}" }}</label>
              </div>

              <div class="form-check">
                <input class="form-check-input" type="radio" id="question-{{ $question->uuid }}-c" name="answers[{{ $question->id }}]" value="{{ $question->option_c }}">
                <label class="form-check-label" for="question-{{ $question->uuid }}-c">{{ "C. {$question->option_c}" }}</label>
              </div>

              <div class="form-check">
                <input class="form-check-input" type="radio" id="question-{{ $question->uuid }}-d" name="answers[{{ $question->id }}]" value="{{ $question->option_d }}">
                <label class="form-check-label" for="question-{{ $question->uuid }}-d">{{ "D. {$question->option_d}" }}</label>
              </div>

              <div class="form-check">
                <input class="form-check-input" type="radio" id="question-{{ $question->uuid }}-e" name="answers[{{ $question->id }}]" value="{{ $question->option_e }}">
                <label class="form-check-label" for="question-{{ $question->uuid }}-e">{{ "E. {$question->option_e}" }}</label>
              </div>

            </div>
          </div>

        </div>
        @empty
        <ul class="list-group text-center push">
          <li class="list-group-item">{{ trans('Tidak Ada Soal Pada Materi Ini') }}</li>
        </ul>
        @endforelse
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="mb-4">
            <button type="submit" class="btn btn-primary w-100" id="submit-button">
              <i class="fa fa-fw fa-circle-check me-1"></i>
              {{ trans('Submit Jawaban') }}
            </button>
          </div>
        </div>
      </div>

    </form>

  </div>
</div>
@endsection
