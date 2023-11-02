<?php

namespace App\Http\Controllers\Students;

use App\Models\Lesson;
use App\Models\Result;
use Illuminate\Http\Request;
use Alaouy\Youtube\Facades\Youtube;
use App\Http\Controllers\Controller;
use App\Services\Lesson\LessonService;
use App\Services\Result\ResultService;
use App\DataTables\Students\Exams\LessonDataTable;

class LessonController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct(
    protected LessonService $lessonService,
    protected ResultService $resultService,
  ) {
    // 
  }

  /**
   * Display a listing of the resource.
   */
  public function index(LessonDataTable $dataTable)
  {
    return $dataTable->render('students.lessons.index');
  }

  /**
   * Display the specified resource.
   */
  public function show(Lesson $lesson)
  {
    $videoId = Youtube::parseVidFromURL($lesson->video_link);
    $video = Youtube::getVideoInfo($videoId);

    // $results = $this->resultService->getWhere(
    //   wheres: [
    //     'questions.lesson_id' => $lesson->id,
    //     'user_id' => me()->id,
    //   ],
    // )->get();

    $results = Result::whereHas('question', function ($query) use ($lesson) {
      $query->where('lesson_id', $lesson->id);
    })
      ->where('user_id', me()->id)
      ->get();

    return view('students.lessons.show', compact('lesson', 'video', 'results'));
  }
}
