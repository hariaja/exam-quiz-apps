@can('lessons.show')
<a href="{{ route('students.lessons.show', $uuid) }}" class="text-info me-1" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans('page.lessons.show') }}"><i class="fa fa-sm fa-eye"></i></a>
@endcan
