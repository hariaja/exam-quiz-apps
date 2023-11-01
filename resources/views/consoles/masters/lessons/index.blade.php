@extends('layouts.app')
@section('title', trans('page.lessons.title'))
@section('hero')
<div class="content content-full">
  <h2 class="content-heading">
    {{ trans('page.lessons.title') }}
    <nav class="breadcrumb push my-0">
      {{ Breadcrumbs::render('lessons.index') }}
    </nav>
  </h2>
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

    <div class="row">
      <div class="col-md-4">
        <div class="mb-4">
          <label for="status" class="form-label">{{ trans('Filter Berdasarkan Status Akun') }}</label>
          <select type="text" class="form-select" name="status" id="status">
            <option value="{{ Helper::ALL }}">{{ Helper::ALL }}</option>
            @foreach ($status as $item)
            <option value="{{ $item }}">{{ $item ? ucfirst('Active') : ucfirst('Inactive') }}</option>
            @endforeach
          </select>
        </div>
      </div>
    </div>

    @can('lessons.create')
    <div class="mb-4">
      <a href="{{ route('lessons.create') }}" class="btn btn-sm btn-primary">
        <i class="fa fa-plus fa-sm me-1"></i>
        {{ trans('page.lessons.create') }}
      </a>
    </div>
    @endcan

    <div class="my-3">
      {{ $dataTable->table() }}
    </div>

  </div>
</div>
@endsection
@push('javascript')
{{ $dataTable->scripts() }}
@vite('resources/js/consoles/lessons/index.js')
<script>
  var urlDestroy = "{{ route('lessons.destroy', ':uuid') }}"

</script>
@endpush
