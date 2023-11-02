@extends('students.layouts.main')
@section('title', trans('page.lessons.title'))
@section('hero')
<div class="bg-body-extra-light">
  <div class="content text-center">
    <div class="pt-5 pb-3">
      <h1 class="h2 fw-bold mb-3">{{ trans('page.lessons.title') }}</h1>
      <h2 class="h5 fw-medium text-muted">
        <nav class="breadcrumb push">
          {{ Breadcrumbs::render('lessons.show', $lesson) }}
        </nav>
      </h2>
    </div>
  </div>
</div>
@endsection
@section('content')
<div class="row">
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
  <div class="col-xl-4">

    @if ($results->isNotEmpty())
    @foreach ($results as $result)
    <div class="block block-rounded">
      <div class="block-header block-header-default text-center">
        <h3 class="block-title">
          <i class="fa fa-fw fa-info opacity-50"></i>
          {{ trans("Soal Ke - {$loop->iteration}") }}
        </h3>
      </div>
      <div class="block-content">
        <table class="table table-borderless table-striped">
          <tbody>
            <tr>
              <td class="{{ $result->student_answer == $result->question->correct_option ? 'text-success' : 'text-danger' }}">
                <i class="fa fa-fw {{ $result->student_answer == $result->question->correct_option ? 'fa-check' : 'fa-xmark' }} opacity-50 me-2"></i>
                <span class="fs-sm">{{ $result->student_answer == $result->question->correct_option ? 'Jawaban Benar' : 'Jawaban Salah' }}</span>
              </td>
            </tr>
            <tr>
              <td>
                <i class="fa fa-fw fa-hand-point-right opacity-50 me-2"></i>
                <span class="fs-sm">{{ trans("{$result->point} Point") }}</span>
              </td>
            </tr>
            <tr>
              <td>
                <i class="fa fa-fw fa-calendar-alt opacity-50 me-2"></i>
                <span class="fs-sm">{{ $result->created_at->locale('id')->diffForHumans() }}</span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    @endforeach

    @else
    <div class="block block-rounded">
      <div class="block-content">
        <a class="btn btn-lg btn-primary w-100 mb-4" href="{{ route('students.results.create', $lesson->uuid) }}">{{ trans('Mulai Quis') }}</a>
      </div>
    </div>
    @endif

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
                <i class="fa fa-fw fa-tags opacity-50 me-2"></i>
                <span class="fs-sm">{{ $lesson->category->name }}</span>
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

  </div>
</div>
@endsection
