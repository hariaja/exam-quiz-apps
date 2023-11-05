@extends('students.layouts.main')
@section('title', trans('page.overview.title'))
@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">{{ __('Beranda') }}</div>

      <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
          {{ session('status') }}
        </div>
        @endif

        {{ __('You are logged as Student!') }}
      </div>
    </div>
  </div>
</div>
@endsection
