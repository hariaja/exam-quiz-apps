@can('levels.edit')
<a href="{{ route('levels.edit', $uuid) }}" class="text-warning me-1" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans('page.levels.edit') }}"><i class="fa fa-sm fa-pencil"></i></a>
@endcan
@can('levels.destroy')
<a href="javascript:void(0)" data-uuid="{{ $uuid }}" class="text-danger me-1 delete-levels" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans('page.levels.delete') }}"><i class="fa fa-sm fa-trash"></i></a>
@endcan

@vite('resources/js/utils/tooltip.js')
