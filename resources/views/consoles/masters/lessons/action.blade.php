@can('lessons.edit')
<a href="{{ route('lessons.edit', $uuid) }}" class="text-warning me-1" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans('page.lessons.edit') }}"><i class="fa fa-sm fa-pencil"></i></a>
@endcan
@can('lessons.show')
<a href="{{ route('lessons.show', $uuid) }}" class="text-info me-1" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans('page.lessons.show') }}"><i class="fa fa-sm fa-eye"></i></a>
@endcan
@can('lessons.destroy')
<a href="javascript:void(0)" data-uuid="{{ $uuid }}" class="text-danger me-1 delete-lessons" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans('page.lessons.delete') }}"><i class="fa fa-sm fa-trash"></i></a>
@endcan

@vite('resources/js/utils/tooltip.js')
