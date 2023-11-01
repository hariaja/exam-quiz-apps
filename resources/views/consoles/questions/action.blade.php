@can('questions.edit')
<a href="{{ route('questions.edit', $uuid) }}" class="text-warning me-1" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans('page.questions.edit') }}"><i class="fa fa-sm fa-pencil"></i></a>
@endcan
@can('questions.show')
<a href="{{ route('questions.show', $uuid) }}" class="text-info me-1" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans('page.questions.show') }}"><i class="fa fa-sm fa-eye"></i></a>
@endcan
@can('questions.destroy')
<a href="javascript:void(0)" data-uuid="{{ $uuid }}" class="text-danger me-1 delete-questions" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans('page.questions.delete') }}"><i class="fa fa-sm fa-trash"></i></a>
@endcan

@vite('resources/js/utils/tooltip.js')
