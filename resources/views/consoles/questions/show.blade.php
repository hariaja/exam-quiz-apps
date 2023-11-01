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
      {{ Breadcrumbs::render('questions.show', $question) }}
    </nav>
  </div>
</div>
@endsection
@section('content')
<div class="block block-rounded">
  <div class="block-header block-header-default">
    <h3 class="block-title">
      {{ trans('page.questions.show') }}
    </h3>
  </div>
  <div class="block-content block-content-full">

    <div class="row">
      <div class="col-md-6">
        <ul class="list-group push">
          <li class="list-group-item d-flex justify-content-between align-items-center">
            {{ trans('Judul Materi') }}
            <span class="fw-semibold">{{ $question->lesson->title }}</span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            {{ trans('Tingkat Kesulitan Soal') }}
            <span class="fw-semibold">{{ $question->title }}</span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            {{ trans('Lihat Materi') }}
            @can('lessons.show')
            <span class="fw-semibold">
              <a href="{{ route('lessons.show', $question->lesson->uuid) }}" target="__blank" class="link-fx">{{ trans('Detail Materi') }}</a>
            </span>
            @endcan
          </li>
          <li class="list-group-item">
            {{ trans('Soal Pertanyaan') }}
            <span class="mb-0" style="text-align: justify">{!! $question->question !!}</span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            {{ trans('Jawaban Benar') }}
            <span class="fw-semibold">{{ $question->correct_option }}</span>
          </li>
        </ul>
      </div>
      <div class="col-md-6">
        <ul class="list-group push">
          <li class="list-group-item d-flex justify-content-between align-items-center">
            {{ trans('Opsi A') }}
            <span class="fw-semibold {{ $question->correct_option === $question->option_a ? 'text-success' : 'text-danger' }}">{{ $question->option_a }}</span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            {{ trans('Opsi B') }}
            <span class="fw-semibold {{ $question->correct_option === $question->option_b ? 'text-success' : 'text-danger' }}">{{ $question->option_b }}</span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            {{ trans('Opsi C') }}
            <span class="fw-semibold {{ $question->correct_option === $question->option_c ? 'text-success' : 'text-danger' }}">{{ $question->option_c }}</span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            {{ trans('Opsi D') }}
            <span class="fw-semibold {{ $question->correct_option === $question->option_d ? 'text-success' : 'text-danger' }}">{{ $question->option_d }}</span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            {{ trans('Opsi E') }}
            <span class="fw-semibold {{ $question->correct_option === $question->option_e ? 'text-success' : 'text-danger' }}">{{ $question->option_e }}</span>
          </li>
        </ul>
      </div>
    </div>

  </div>
</div>
@endsection
