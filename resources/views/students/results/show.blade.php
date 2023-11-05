@extends('students.layouts.main')
@section('title', trans('page.results.title'))
@section('hero')
<div class="bg-body-extra-light">
  <div class="content text-center">
    <div class="pt-5 pb-3">
      <h1 class="h2 fw-bold mb-3">{{ trans('page.results.title') }}</h1>
      <h2 class="h5 fw-medium text-muted">
        <a href="{{ route('students.results.index') }}" class="btn btn-sm btn-danger">
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
      {{ trans('page.results.show') }}
    </h3>
  </div>
  <div class="block-content">

    <div class="row">
      <div class="col-12 col-xl-6">
        <ul class="list-group push">
          <li class="list-group-item d-flex justify-content-between align-items-center">
            {{ trans('Judul Materi') }}
            <span class="fw-semibold">{{ $lesson->title }}</span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            {{ trans('Kategori') }}
            <span class="fw-semibold">{{ $lesson->category->name }}</span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            {{ trans('Total Point Nilai Didapat') }}
            <span class="fw-semibold">{{ "{$lesson->results->sum('point')} Point" }}</span>
          </li>
        </ul>
      </div>
    </div>

    <div class="mb-4">
      <h5 class="h6 fw-bold mb-3">
        {{ trans('Detail Jawaban Anda') }}
      </h5>
    </div>

    <table class="table table-bordered table-vcenter table-responsive text-center">
      <thead>
        <tr>
          <th>#</th>
          <th>Soal</th>
          <th>Jawaban Anda</th>
          <th>Jawaban Benar</th>
          <th>Point</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($lesson->results as $result)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{!! $result->question->question !!}</td>
          <td class="{{ $result->student_answer == $result->question->correct_option ? 'text-success' : 'text-danger' }}">{{ $result->student_answer }}</td>
          <td>{{ $result->question->correct_option  }}</td>
          <td>{{ $result->point }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>

  </div>
</div>
@endsection
