@extends('layouts.guest')
@section('title', trans('Reset Kata Sandi'))
@section('content')
<div class="bg-gd-sea">
  <div class="hero-static content content-full bg-body-extra-light">
    <!-- Header -->
    <div class="py-4 px-1 text-center mb-4">
      <img src="{{ asset('assets/images/logos/logos.png') }}" alt="Login Logo" width="40%">
      <h1 class="h3 fw-bold mt-5 mb-2">{{ trans('Jangan khawatir, kami mendukung Anda') }}</h1>
      <h2 class="h5 fw-medium text-muted mb-0">{{ trans('Silakan masukkan nama pengguna atau email Anda') }}</h2>
    </div>
    <!-- END Header -->

    <!-- Form Body -->
    <div class="row justify-content-center px-1">
      <div class="col-sm-8 col-md-6 col-xl-4">

        @if (session('status'))
        @include('components.success-alert')
        @endif

        <form action="{{ route('password.email') }}" method="POST" onsubmit="return disableSubmitButton()">
          @csrf

          <div class="form-floating mb-4">
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="{{ trans('Email') }}" required>
            <label class="form-label" for="email">{{ trans('Email') }}</label>
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-4 space-y-2">
            <button type="submit" class="btn btn-lg btn-alt-primary w-100 py-3 fw-semibold" id="submit-button">
              {{ trans('Kirim Tautan Reset Kata Sandi') }}
            </button>
            <a class="btn btn-alt-secondary w-100" href="{{ route('login') }}">
              {{ trans('Masuk Aplikasi') }}
            </a>
          </div>

        </form>
      </div>
    </div>
    <!-- END Form Body -->
  </div>
</div>
@endsection
{{-- @section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Reset Password') }}</div>

<div class="card-body">
  @if (session('status'))
  <div class="alert alert-success" role="alert">
    {{ session('status') }}
  </div>
  @endif

  <form method="POST" action="{{ route('password.email') }}">
    @csrf

    <div class="row mb-3">
      <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

      <div class="col-md-6">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

        @error('email')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>

    <div class="row mb-0">
      <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-primary">
          {{ __('Send Password Reset Link') }}
        </button>
      </div>
    </div>
  </form>
</div>
</div>
</div>
</div>
</div>
@endsection --}}
