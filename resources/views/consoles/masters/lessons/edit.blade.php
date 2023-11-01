@extends('layouts.app')
@section('title') {{ trans('page.lessons.title') }} @endsection
@section('hero')
<div class="content content-full">
  <div class="content-heading">
    <div class="d-flex justify-content-between align-items-sm-center">
      {{ trans('page.lessons.title') }}
      <a href="{{ route('lessons.index') }}" class="btn btn-sm btn-block-option text-danger">
        <i class="fa fa-xs fa-chevron-left me-1"></i>
        {{ trans('button.back') }}
      </a>
    </div>
    <nav class="breadcrumb push my-0">
      {{ Breadcrumbs::render('lessons.edit', $lesson) }}
    </nav>
  </div>
</div>
@endsection
@section('content')
<div class="block block-rounded">
  <div class="block-header block-header-default">
    <h3 class="block-title">
      {{ trans('page.lessons.edit') }}
    </h3>
  </div>
  <div class="block-content block-content-full">

    <form action="{{ route('lessons.update', $lesson->uuid) }}" method="POST" enctype="multipart/form-data" onsubmit="return disableSubmitButton()">
      @csrf
      @method('PATCH')

      <div class="row justify-content-center">
        <div class="col-md-6">

          <div class="mb-4">
            <label for="title" class="form-label">{{ trans('Judul') }}</label>
            <span class="text-danger">*</span>
            <input type="text" name="title" id="title" value="{{ old('title', $lesson->title) }}" class="form-control @error('title') is-invalid @enderror" placeholder="{{ trans('Judul') }}">
            @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-4">
            <label for="level_id" class="form-label">{{ trans('Jenjang Level') }}</label>
            <span class="text-danger">*</span>
            <select name="level_id" id="level_id" class="js-select2 form-select @error('level_id') is-invalid @enderror" data-placeholder="{{ trans('Pilih Jenjang Level') }}" style="width: 100%;">
              <option></option>
              @foreach ($levels as $item)
              <option value="{{ $item->id }}" @if (old('level_id', $lesson->level_id)==$item->id) selected @endif>{{ $item->name }}</option>
              @endforeach
            </select>
            @error('level_id')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-4">
            <label for="video_link" class="form-label">{{ trans('Link Video') }}</label>
            <span class="text-danger">*</span>
            <input type="link" name="video_link" id="video_link" value="{{ old('video_link', $lesson->video_link) }}" class="form-control @error('video_link') is-invalid @enderror" placeholder="{{ trans('Link Video') }}">
            @error('video_link')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-4">
            <label for="status" class="form-label">{{ trans('Pilih Status') }}</label>
            <select type="text" class="form-select" name="status" id="status">
              @foreach ($status as $item)
              <option value="{{ $item }}" {{ $lesson->status == $item ? 'selected' : '' }}>{{ $item ? ucfirst('Active') : ucfirst('Inactive') }}</option>
              @endforeach
            </select>
          </div>

          <div class="mb-0">
            <div class="block block-rounded">
              <div class="block-header block-header-default">
                <label class="form-label">{{ trans('button.image') }}</label>
              </div>
              <div class="block-content">
                <div class="push">
                  <img class="img-prev img-square-center" src="{{ $lesson->getLessonBanner() }}" alt="">
                </div>
              </div>
            </div>
          </div>
          <div class="mb-4">
            <label class="form-label" for="image">{{ trans('Upload Banner') }}</label>
            <span class="text-danger">*</span>
            <input class="form-control @error('file') is-invalid @enderror" type="file" accept="image/*" id="image" name="file" onchange="return previewImage()">
            @error('file')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-4">
            <label class="form-label" for="description">{{ trans('Konten') }}</label>
            <span class="text-danger">*</span>
            <textarea name="description" id="js-ckeditor5-classic" class="form-control @error('description') is-invalid @enderror" placeholder="{{ __('Konten Materi...') }}">{{ old('description', $lesson->description) }}</textarea>
            @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-4">
            <button type="submit" class="btn btn-primary w-100" id="submit-button">
              <i class="fa fa-fw fa-circle-check me-1"></i>
              {{ trans('button.edit') }}
            </button>
          </div>

        </div>
      </div>

    </form>

  </div>
</div>
@endsection
@vite('resources/js/consoles/lessons/input.js')
