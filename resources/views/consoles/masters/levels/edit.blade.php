@extends('layouts.app')
@section('title') {{ trans('page.levels.title') }} @endsection
@section('hero')
<div class="content content-full">
  <div class="content-heading">
    <div class="d-flex justify-content-between align-items-sm-center">
      {{ trans('page.levels.title') }}
      <a href="{{ route('levels.index') }}" class="btn btn-sm btn-block-option text-danger">
        <i class="fa fa-xs fa-chevron-left me-1"></i>
        {{ trans('button.back') }}
      </a>
    </div>
    <nav class="breadcrumb push my-0">
      {{ Breadcrumbs::render('levels.edit', $level) }}
    </nav>
  </div>
</div>
@endsection
@section('content')
<div class="block block-rounded">
  <div class="block-header block-header-default">
    <h3 class="block-title">
      {{ trans('page.levels.edit') }}
    </h3>
  </div>
  <div class="block-content block-content-full">

    <form action="{{ route('levels.update', $level->uuid) }}" method="POST" onsubmit="return disableSubmitButton()">
      @csrf
      @method('PATCH')

      <div class="row justify-content-center">
        <div class="col-md-6">

          <div class="mb-4">
            <label class="form-label" for="name">{{ trans('Jenjang Level') }}</label>
            <span class="text-danger">*</span>
            <input type="text" name="name" id="name" value="{{ old('name', $level->name) }}" class="form-control @error('name') is-invalid @enderror" placeholder="{{ trans('etc. Sekolah Dasar') }}" onkeypress="return onlyLetter(event)">
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-4">
            <button type="submit" class="btn btn-warning w-100" id="submit-button">
              <i class="fa fa-fw fa-circle-check opacity-50 me-1"></i>
              {{ trans('button.edit') }}
            </button>
          </div>

        </div>
      </div>

    </form>

  </div>
</div>
@endsection
{{-- @vite('resources/js/consoles/levels/input.js') --}}
