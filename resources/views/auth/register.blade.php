@extends('layouts.guest')
@section('title', trans('Register Akun Baru'))
@section('content')
<div class="bg-gd-sea">
  <div class="hero-static content content-full bg-body-extra-light">

    <!-- Header -->
    <div class="py-4 px-1 text-center mb-4">
      <img src="{{ asset('assets/images/logos/logos.png') }}" alt="Login Logo" width="40%">
      <h1 class="h3 fw-bold mt-5 mb-2">{{ trans('Buat Akun Baru') }}</h1>
      <h2 class="h5 fw-medium text-muted mb-0">{{ trans('Silahkan isi sesuai form yang ada dibawah ini.') }}</h2>
    </div>
    <!-- END Header -->

    <div class="row justify-content-center px-1">
      <div class="col-sm-8 col-md-6 col-xl-4">

        <form action="{{ route('register') }}" method="POST" onsubmit="return disableSubmitButton()">
          @csrf

          <div class="form-floating mb-4">
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" autocomplete="name" placeholder="{{ trans('Nama Lengkap') }}" required>
            <label class="form-label" for="name">{{ trans('Nama Lengkap') }}</label>
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-floating mb-4">
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="{{ trans('Email') }}" required>
            <label class="form-label" for="email">{{ trans('Email') }}</label>
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-floating mb-4 password-form">
            <i class="icon far fa-eye-slash fa-lg toggle-password"></i>
            <input type="password" class="form-control" id="password" name="password" autocomplete="current-password" placeholder="Password" required>
            <label class="form-label" for="password">{{ trans('Password') }}</label>
          </div>

          <div class="form-floating mb-4 password-form">
            <i class="icon far fa-eye-slash fa-lg toggle-password"></i>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" autocomplete="current-password" placeholder="Password" required>
            <label class="form-label" for="password_confirmation">{{ trans('Password Konfirmasi') }}</label>
          </div>

          <div class="mb-4 space-y-2">
            <button type="submit" class="btn btn-lg btn-alt-primary w-100 py-3 fw-semibold" id="submit-button">
              {{ trans('Buat Akun Sekarang') }}
            </button>
            <a class="btn btn-alt-secondary w-100" href="{{ route('login') }}">
              {{ trans('Masuk Aplikasi') }}
            </a>
          </div>

        </form>

      </div>
    </div>

  </div>
</div>
@endsection
