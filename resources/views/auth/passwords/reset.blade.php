@extends('layouts.guest')
@section('title', trans('Reset Kata Sandi'))
@section('content')
<div class="bg-gd-sea">
  <div class="hero-static content content-full bg-body-extra-light">
    <!-- Header -->
    <div class="py-4 px-1 text-center mb-4">
      <img src="{{ asset('assets/images/logos/logos.png') }}" alt="Login Logo" width="40%">
      <h1 class="h3 fw-bold mt-5 mb-2">{{ trans('Perbaharui Kata Sandi') }}</h1>
      <h2 class="h5 fw-medium text-muted mb-0">{{ trans('Silakan masukkan password baru anda') }}</h2>
    </div>
    <!-- END Header -->

    <!-- Form Body -->
    <div class="row justify-content-center px-1">
      <div class="col-sm-8 col-md-6 col-xl-4">

        <form action="{{ route('password.update') }}" method="POST" onsubmit="return disableSubmitButton()">
          @csrf

          <input type="hidden" name="token" value="{{ $token }}">

          <div class="form-floating mb-4">
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $email ?? old('email') }}" autocomplete="email" placeholder="{{ trans('Email') }}" required readonly>
            <label class="form-label" for="email">{{ trans('Email') }}</label>
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-floating mb-4 password-form">
            <i class="icon far fa-eye-slash fa-lg toggle-password"></i>
            <input type="password" class="form-control" id="password" name="password" autocomplete="new-password" placeholder="Password" required>
            <label class="form-label" for="password">{{ trans('Password') }}</label>
          </div>

          <div class="form-floating mb-4 password-form">
            <i class="icon far fa-eye-slash fa-lg toggle-password"></i>
            <input type="password" class="form-control" id="password-confirm" name="password_confirmation" autocomplete="new-password" placeholder="Password" required>
            <label class="form-label" for="password-confirm">{{ trans('Konfirmasi Password') }}</label>
          </div>

          <div class="mb-4">
            <button type="submit" class="btn btn-lg btn-alt-primary w-100 py-3 fw-semibold" id="submit-button">
              {{ trans('Reset Kata Sandi') }}
            </button>
          </div>

        </form>

      </div>
    </div>

  </div>
</div>
@endsection
