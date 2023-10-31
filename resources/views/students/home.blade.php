This Student Page

<a class="dropdown-item d-flex align-items-center text-danger justify-content-between space-x-1" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
  <span>{{ trans('Keluar Aplikasi') }}</span>
  <i class="fa fa-fw fa-sign-out-alt opacity-25"></i>
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
  @csrf
</form>
