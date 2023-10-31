@extends('layouts.app')
@section('title', trans('page.levels.title'))
@section('hero')
<div class="content content-full">
  <h2 class="content-heading">
    {{ trans('page.levels.title') }}
    <nav class="breadcrumb push my-0">
      {{ Breadcrumbs::render('levels.index') }}
    </nav>
  </h2>
</div>
@endsection
@section('content')
<div class="block block-rounded">
  <div class="block-header block-header-default">
    <h3 class="block-title">
      {{ trans('page.levels.index') }}
    </h3>
  </div>
  <div class="block-content">

    @can('levels.create')
    <div class="mb-4">
      <a href="{{ route('levels.create') }}" class="btn btn-sm btn-primary">
        <i class="fa fa-plus fa-sm me-1"></i>
        {{ trans('page.levels.create') }}
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
@vite('resources/js/consoles/levels/index.js')
<script>
  var urlDestroy = "{{ route('levels.destroy', ':uuid') }}"

</script>
@endpush
