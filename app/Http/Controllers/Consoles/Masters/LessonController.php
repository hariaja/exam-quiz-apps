<?php

namespace App\Http\Controllers\Consoles\Masters;

use App\Models\Lesson;
use Illuminate\Http\Request;
use App\Helpers\Enums\DecideType;
use Alaouy\Youtube\Facades\Youtube;
use App\Http\Controllers\Controller;
use App\Services\Level\LevelService;
use App\Services\Lesson\LessonService;
use App\DataTables\Scopes\StatusFilter;
use App\DataTables\Consoles\Masters\LessonDataTable;
use App\Helpers\Helper;
use App\Http\Requests\Consoles\Masters\LessonRequest;

class LessonController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct(
    protected LevelService $levelService,
    protected LessonService $lessonService,
  ) {
    // 
  }

  /**
   * Display a listing of the resource.
   */
  public function index(LessonDataTable $dataTable, Request $request)
  {
    $status = DecideType::toArray();

    return $dataTable
      ->addScope(new StatusFilter($request))
      ->render('consoles.masters.lessons.index', compact(
        'status'
      ));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $status = DecideType::toArray();
    $levels = $this->levelService->all();

    return view('consoles.masters.lessons.create', compact('levels', 'status'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(LessonRequest $request)
  {
    $this->lessonService->handleStoreData($request);
    return redirect(route('lessons.index'))->withSuccess(trans('alert.create'));
  }

  /**
   * Display the specified resource.
   */
  public function show(Lesson $lesson)
  {
    $videoId = Youtube::parseVidFromURL($lesson->video_link);
    $video = Youtube::getVideoInfo($videoId);

    return view('consoles.masters.lessons.show', compact('lesson', 'video'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Lesson $lesson)
  {
    $status = DecideType::toArray();
    $levels = $this->levelService->all();

    return view('consoles.masters.lessons.edit', compact('levels', 'status', 'lesson'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(LessonRequest $request, Lesson $lesson)
  {
    $this->lessonService->handleUpdateData($request, $lesson->id);
    return redirect(route('lessons.index'))->withSuccess(trans('alert.update'));
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Lesson $lesson)
  {
    $this->lessonService->handleDeleteData($lesson->id);
    return response()->json([
      'message' => trans('alert.delete')
    ]);
  }
}
