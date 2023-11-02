@extends('students.layouts.main')
@section('title', trans('page.lessons.title'))
@section('hero')
<div class="bg-body-extra-light">
  <div class="content text-center">
    <div class="pt-5 pb-3">
      <h1 class="h2 fw-bold mb-3">{{ trans('page.lessons.title') }}</h1>
      <h2 class="h5 fw-medium text-muted">
        <nav class="breadcrumb push">
          {{ Breadcrumbs::render('lessons.index') }}
        </nav>
      </h2>
    </div>
  </div>
</div>
@endsection
@section('content')
<div class="block block-rounded">
  <div class="block-header block-header-default">
    <h3 class="block-title">
      {{ trans('page.lessons.index') }}
    </h3>
  </div>
  <div class="block-content">

    <div class="my-3">
      {{ $dataTable->table() }}
    </div>

  </div>
</div>
@endsection
@push('javascript')
{{ $dataTable->scripts() }}
@vite('resources/js/students/lessons/index.js')
@endpush
