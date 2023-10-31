@extends('layouts.app')
@section('title', trans('page.overview.title'))
@section('hero')
<div class="content content-full">
  <h2 class="content-heading">
    {{ trans('page.overview.title') }}
    <nav class="breadcrumb push my-0">
      {{ Breadcrumbs::render('home') }}
    </nav>
  </h2>
</div>
@endsection
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Dashboard') }}</div>

        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif

          {{ __('You are logged as Admin!') }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
