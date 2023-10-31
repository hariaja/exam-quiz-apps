<?php

namespace App\Http\Controllers\Consoles\Masters;

use App\DataTables\Consoles\Masters\LevelDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Consoles\Masters\LevelRequest;
use App\Models\Level;
use App\Services\Level\LevelService;
use Illuminate\Http\Request;

class LevelController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct(
    protected LevelService $levelService,
  ) {
    // 
  }

  /**
   * Display a listing of the resource.
   */
  public function index(LevelDataTable $dataTable)
  {
    return $dataTable->render('consoles.masters.levels.index');
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('consoles.masters.levels.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(LevelRequest $request)
  {
    $this->levelService->create($request->validated());
    return redirect(route('levels.index'))->withSuccess(trans('alert.create'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Level $level)
  {
    return view('consoles.masters.levels.edit', compact('level'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(LevelRequest $request, Level $level)
  {
    $this->levelService->update($level->id, $request->validated());
    return redirect(route('levels.index'))->withSuccess(trans('alert.update'));
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Level $level)
  {
    $this->levelService->delete($level->id);
    return response()->json([
      'message' => trans('alert.delete')
    ]);
  }
}
