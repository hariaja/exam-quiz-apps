<?php

namespace App\DataTables\Consoles\Masters;

use App\Models\Level;
use App\Helpers\Helper;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use App\Services\Level\LevelService;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class LevelDataTable extends DataTable
{
  /**
   * Create a new datatables instance.
   *
   * @return void
   */
  public function __construct(
    protected LevelService $levelService,
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
      ->editColumn('updated_at', fn ($row) => Helper::parseDateTime($row->updated_at))
      ->addColumn('action', 'consoles.masters.levels.action')
      ->rawColumns([
        'action',
      ]);
  }

  /**
   * Get the query source of dataTable.
   */
  public function query(Level $model): QueryBuilder
  {
    return $this->levelService->getQuery()->oldest('name');
  }

  /**
   * Optional method if you want to use the html builder.
   */
  public function html(): HtmlBuilder
  {
    return $this->builder()
      ->setTableId('level-table')
      ->columns($this->getColumns())
      ->minifiedAjax()
      //->dom('Bfrtip')
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
      'levels.edit',
      'levels.destroy',
    ]);

    return [
      Column::make('DT_RowIndex')
        ->title(trans('#'))
        ->orderable(false)
        ->searchable(false)
        ->width('5%')
        ->addClass('text-center'),
      Column::make('name')
        ->title(trans('Jenjang'))
        ->addClass('text-center'),
      Column::make('updated_at')
        ->title(trans('Terakhir Diperbaharui'))
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
    return 'Level_' . date('YmdHis');
  }
}
