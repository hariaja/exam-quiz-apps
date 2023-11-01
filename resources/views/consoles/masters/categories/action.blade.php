@can('categories.edit')
<a href="{{ route('categories.edit', $uuid) }}" class="text-warning me-1" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans('page.categories.edit') }}"><i class="fa fa-sm fa-pencil"></i></a>
@endcan
@can('categories.destroy')
<a href="javascript:void(0)" data-uuid="{{ $uuid }}" class="text-danger me-1 delete-categories" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans('page.categories.delete') }}"><i class="fa fa-sm fa-trash"></i></a>
@endcan

@vite('resources/js/utils/tooltip.js')
