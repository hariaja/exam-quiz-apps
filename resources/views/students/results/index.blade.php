@extends('students.layouts.main')
@section('title', trans('page.results.title'))
@section('hero')
<div class="bg-body-extra-light">
  <div class="content text-center">
    <div class="pt-5 pb-3">
      <h1 class="h2 fw-bold mb-3">{{ trans('page.results.title') }}</h1>
      <h2 class="h5 fw-medium text-muted">
        {{ trans('Berikut adalah materi yang sudah anda ikuti kuis nya') }}
      </h2>
    </div>
  </div>
</div>
@endsection
@section('content')
<div class="row justify-content-center">

  <h2 class="h6 fw-medium text-muted">
    {{ trans('Pilih Materi Untuk Melihat Detailnya') }}
  </h2>

  @forelse ($lessons as $lesson)
  <div class="col-12 col-xl-6">
    <a class="block block-rounded block-link-rotate text-end" href="{{ route('students.results.show', $lesson->uuid) }}">
      <div class="block-content block-content-full d-sm-flex justify-content-between align-items-center">
        <div class="d-none d-sm-block">
          <i class="fa fa-file fa-2x opacity-25"></i>
        </div>
        <div class="text-end">
          <div class="fs-3 fw-semibold">{{ $lesson->title }}</div>
          <div class="fs-sm fw-semibold text-uppercase text-muted">{{ $lesson->category->name }}</div>
        </div>
      </div>
    </a>
  </div>
  @empty
  <div class="col-12 col-xl-6">
    <h2 class="h5 fw-medium">
      {{ trans('Belum Ada Materi Yang Diselesaikan') }}
    </h2>
  </div>
  @endforelse
</div>
@endsection
