<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Icons -->
  @include('components.logos')
  <!-- END Icons -->

  <!-- Styles -->
  @include('components.styles')
  <!-- Styles -->

  <!-- Vite Builder -->
  @vite([])
</head>

<body>
  <!-- Page Container -->
  <div id="page-container" class="sidebar-dark side-scroll page-header-fixed page-header-dark main-content-boxed">

    <!-- Sidebar -->
    <nav id="sidebar">
      <!-- Sidebar Content -->
      <div class="sidebar-content">
        <!-- Side Header -->
        <div class="content-header justify-content-lg-center bg-black-10">
          <!-- Logo -->
          <div>
            <span class="smini-visible fw-bold tracking-wide fs-lg">
              c<span class="text-primary">b</span>
            </span>
            <a class="link-fx fw-bold tracking-wide mx-auto" href="{{ route('students.home') }}">
              <span class="smini-hidden">
                <i class="fa fa-pencil-alt text-primary me-2"></i>
                <span class="fs-4 text-dual">Edu</span><span class="fs-4 text-primary">mic</span>
              </span>
            </a>
          </div>
          <!-- END Logo -->

          <!-- Options -->
          <div>
            <!-- Close Sidebar, Visible only on mobile screens -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <button type="button" class="btn btn-sm btn-alt-danger d-lg-none" data-toggle="layout" data-action="sidebar_close">
              <i class="fa fa-fw fa-times"></i>
            </button>
            <!-- END Close Sidebar -->
          </div>
          <!-- END Options -->
        </div>
        <!-- END Side Header -->

        <!-- Sidebar Scrolling -->
        <div class="js-sidebar-scroll">
          <!-- Side Main Navigation -->
          <div class="content-side content-side-full">
            <ul class="nav-main">
              @include('students.partials.navbar')
            </ul>
          </div>
          <!-- END Side Main Navigation -->
        </div>
        <!-- END Sidebar Scrolling -->
      </div>
      <!-- Sidebar Content -->
    </nav>
    <!-- END Sidebar -->

    <!-- Header -->
    <header id="page-header">
      @include('students.partials.header')
    </header>
    <!-- END Header -->

    <!-- Main Container -->
    <main id="main-container">
      @yield('hero')

      <!-- Page Content -->
      <div class="content">
        @yield('content')
      </div>
      <!-- END Page Content -->
    </main>
    <!-- END Main Container -->

    <!-- Footer -->
    <footer id="page-footer">
      @include('students.partials.footer')
    </footer>
    <!-- END Footer -->
  </div>
  <!-- END Page Container -->

  @include('components.javascript')
</body>
</html>
