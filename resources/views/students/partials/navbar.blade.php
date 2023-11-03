<li class="nav-main-item">
  <a class="nav-main-link {{ Request::is('students/home*') ? 'active' : '' }}" href="{{ route('students.home') }}">
    <i class="nav-main-link-icon fa fa-house-user"></i>
    <span class="nav-main-link-name">{{ trans('page.overview.title') }}</span>
  </a>
</li>

<li class="nav-main-item">
  <a class="nav-main-link {{ Request::is('students/lessons*') ? 'active' : '' }}" href="{{ route('students.lessons.index') }}">
    <i class="nav-main-link-icon fa fa-folder-open"></i>
    <span class="nav-main-link-name">{{ trans('page.lessons.title') }}</span>
  </a>
</li>
