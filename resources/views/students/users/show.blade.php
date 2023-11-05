@extends('students.layouts.main')
@section('title', trans('page.users.edit'))
@section('hero')
<div class="bg-body-extra-light">
  <div class="content text-center">
    <div class="pt-5 pb-3">
      <h1 class="h2 fw-bold mb-3">{{ trans('page.users.edit') }}</h1>
      <h2 class="h5 fw-medium text-muted">
        {{ trans('page.users.edit') }}
      </h2>
    </div>
  </div>
</div>
@endsection
@section('content')
<div class="block block-rounded">
  <div class="block-header block-header-default">
    <h3 class="block-title">
      {{ trans('page.users.edit') }}
    </h3>
  </div>
  <div class="block-content block-content-full">

    <form action="{{ route('students.users.update', $user->uuid) }}" method="POST" enctype="multipart/form-data" onsubmit="return disableSubmitButton()">
      @csrf
      @method('PATCH')

      <div class="row justify-content-center">
        <div class="col-md-6">

          <div class="mb-4">
            <label for="name" class="form-label">{{ trans('Nama') }}</label>
            <span class="text-danger">*</span>
            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="form-control @error('name') is-invalid @enderror" placeholder="{{ trans('Nama Lengkap') }}" onkeypress="return onlyLetter(event)">
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-4">
            <label for="email" class="form-label">{{ trans('Email') }}</label>
            <span class="text-danger">*</span>
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" required placeholder="{{ trans('Alamat Email') }}">
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-4">
            <label for="roles" class="form-label">{{ trans('Peran Pengguna') }}</label>
            <span class="text-danger">*</span>
            <select name="roles" id="roles" class="js-select2 form-select @error('roles') is-invalid @enderror" data-placeholder="{{ trans('Pilih Peran') }}" style="width: 100%;">
              <option></option>
              @foreach ($roles as $item)
              <option value="{{ $item->id }}" @if (old('roles', $user->getRoleId())==$item->id) selected @endif>{{ $item->name }}</option>
              @endforeach
            </select>
            @error('roles')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-0">
            <div class="block block-rounded">
              <div class="block-header block-header-default">
                <label class="form-label">{{ trans('button.image') }}</label>
              </div>
              <div class="block-content">
                <div class="push">
                  <img class="img-prev img-profile-center" src="{{ $user->getUserAvatar() }}" alt="">
                </div>
              </div>
            </div>
          </div>
          <div class="mb-4">
            <label class="form-label" for="image">{{ trans('Upload Avatar') }}</label>
            <input class="form-control @error('file') is-invalid @enderror" type="file" accept="image/*" id="image" name="file" onchange="return previewImage()">
            @error('file')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-4">
            <button type="submit" class="btn btn-warning w-100" id="submit-button">
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
