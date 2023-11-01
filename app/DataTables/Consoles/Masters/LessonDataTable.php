<?php

namespace App\DataTables\Consoles\Masters;

use App\Models\Lesson;
use App\Helpers\Helper;
use App\Services\Lesson\LessonService;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class LessonDataTable extends DataTable
{
  /**
   * Create a new datatables instance.
   *
   * @return void
   */
  public function __construct(
    protected LessonService $lessonService,
  ) {
    // 
  }

  /**
   * Build the DataTable class.
   *
   * @param QueryBuilder $query Results from query() method.
   */
  public function dataTable(QueryBuilder $query): EloquentDataTable
  {
    return (new EloquentDataTable($query))
      ->addIndexColumn()
      ->addColumn('level', fn ($row) => $row->level->name)
      ->addColumn('category', fn ($row) => $row->category->name)
      ->editColumn('status', fn ($row) => $row->statusLabel)
      ->editColumn('created_at', fn ($row) => Helper::parseDateTime($row->created_at))
      ->addColumn('action', 'consoles.masters.lessons.action')
      ->rawColumns([
        'action',
        'status',
      ]);
  }

  /**
   * Get the query source of dataTable.
   */
  public function query(Lesson $model): QueryBuilder
  {
    return $this->lessonService->getQuery()->oldest('title');
  }

  /**
   * Optional method if you want to use the html builder.
   */
  public function html(): HtmlBuilder
  {
    return $this->builder()
      ->setTableId('lesson-table')
      ->columns($this->getColumns())
      ->minifiedAjax()
      //->dom('Bfrtip')
      ->ajax([
        'url' => route('lessons.index'),
        'type' => 'GET',
        'data' => "
        function(data) {
          _token = '{{ csrf_token() }}',
          data.status = $('select[name=status]').val();
        }"
      ])
      ->addTableClass([
        'table',
        'table-striped',
        'table-bordered',
        'table-hover',
        'table-vcenter',
      ])
      ->processing(true)
      ->retrieve(true)
      ->serverSide(true)
      ->autoWidth(false)
      ->pageLength(5)
      ->responsive(true)
      ->lengthMenu([5, 10, 20])
      ->orderBy(1);
  }

  /**
   * Get the dataTable columns definition.
   */
  public function getColumns(): array
  {
    // Check Visibility of Action Row
    $visibility = Helper::checkPermissions([
      'lessons.edit',
      'lessons.destroy',
    ]);

    return [
      Column::make('DT_RowIndex')
        ->title(trans('#'))
        ->orderable(false)
        ->searchable(false)
        ->width('5%')
        ->addClass('text-center'),
      Column::make('title')
        ->title(trans('Judul'))
        ->addClass('text-center'),
      Column::make('level')
        ->title(trans('Jenjang'))
        ->addClass('text-center'),
      Column::make('category')
        ->title(trans('Kategori'))
        ->addClass('text-center'),
      Column::make('status')
        ->title(trans('Status'))
        ->addClass('text-center'),
      Column::make('created_at')
        ->title(trans('Diupload Pada'))
        ->addClass('text-center'),
      Column::computed('action')
        ->exportable(false)
        ->printable(false)
        ->visible($visibility)
        ->width('10%')
        ->addClass('text-center'),
    ];
  }

  /**
   * Get the filename for export.
   */
  protected function filename(): string
  {
    return 'Lesson_' . date('YmdHis');
  }
}
