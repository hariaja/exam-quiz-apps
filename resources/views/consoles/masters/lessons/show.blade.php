@extends('layouts.app')
@section('title', trans('page.lessons.show'))
@section('hero')
<div class="bg-image" style="background-image: url('{{ Storage::url($lesson->banner) }}');">
  <div class="bg-black-50">
    <div class="content content-top text-center">
      <div class="py-5">
        <h1 class="fw-bold text-white mb-2">{{ $lesson->title }}</h1>
        <h2 class="h4 fw-normal text-white-75">{{ trans('Jenjang') }} &bull; {{ $lesson->level->name }}</h2>
      </div>
    </div>
  </div>
</div>
@endsection
@section('content')
<nav class="breadcrumb push bg-body-extra-light rounded-pill px-4 py-2">
  {{ Breadcrumbs::render('lessons.show', $lesson) }}
</nav>

<div class="row">
  <div class="col-xl-4">

    <!-- Subscribe -->
    <div class="block block-rounded">
      <div class="block-content">
        <a class="btn btn-lg btn-primary w-100 mb-2" href="javascript:void(0)">Subscribe from $19/month</a>
        <p class="text-center">or <a class="link-fx" href="javascript:void(0)">buy this course for $14</a></p>
      </div>
    </div>
    <!-- END Subscribe -->

    <!-- Instructor -->
    {{-- <a class="block block-rounded block-link-shadow text-center" href="javascript:void(0)">
      <div class="block-header block-header-default">
        <h3 class="block-title">
          <i class="fa fa-fw fa-graduation-cap opacity-50"></i>
          Instructor
        </h3>
      </div>
      <div class="block-content block-content-full">
        <div class="push">
          <img class="img-avatar" src="assets/media/avatars/avatar10.jpg" alt="">
        </div>
        <div class="fw-semibold mb-1">John Doe</div>
        <div class="fs-sm text-muted">Web Designer</div>
      </div>
    </a> --}}
    <!-- END Instructor -->

    <!-- Course Info -->
    <div class="block block-rounded">
      <div class="block-header block-header-default text-center">
        <h3 class="block-title">
          <i class="fa fa-fw fa-info opacity-50"></i>
          {{ trans('Detail') }}
        </h3>
      </div>
      <div class="block-content">
        <div class="fw-semibold text-center mb-1">
          {{ $lesson->title }}
        </div>
        <div class="fs-sm text-muted text-center mb-3">
          {{ trans('Jenjang') }} &bull; {{ $lesson->level->name }}
        </div>
        <table class="table table-borderless table-striped">
          <tbody>
            <tr>
              <td>
                <i class="fa fa-fw fa-video opacity-50 me-2"></i>
                <a class="link-fx fs-sm fw-medium" target="__blank" href="{{ $lesson->video_link }}">
                  {{ trans('YT Video') }}
                </a>
              </td>
            </tr>
            <tr>
              <td>
                <i class="fa fa-fw fa-calendar-alt opacity-50 me-2"></i>
                <span class="fs-sm">{{ $lesson->created_at->locale('id')->diffForHumans() }}</span>
              </td>
            </tr>
            <tr>
              <td>
                <i class="fa fa-fw fa-power-off opacity-50 me-2"></i>
                {!! $lesson->statusLabel !!}
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <!-- END Course Info -->

  </div>

  <div class="col-xl-8">
    <div class="fs-lg p-4 bg-earth rounded text-white text-center push">
      <div class="mb-0">
        <div class="ratio ratio-16x9 rounded">
          {!! $video->player->embedHtml !!}
        </div>
      </div>
    </div>

    <div class="block block-rounded">
      <div class="block-content">
        {!! $lesson->description !!}
      </div>
    </div>
  </div>
</div>
@endsection
@vite('resources/js/consoles/lessons/show.js')
