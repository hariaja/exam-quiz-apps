<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Http\Requests\Students\ResultRequest;
use App\Models\Lesson;
use App\Models\Result;
use App\Services\Lesson\LessonService;
use App\Services\Question\QuestionService;
use App\Services\Result\ResultService;
use Illuminate\Http\Request;

class ResultController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct(
    protected ResultService $resultService,
    protected QuestionService $questionService,
    protected LessonService $lessonService,
  ) {
    // 
  }

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    // $lessons = Lesson::with('results')->get();

    $lessons = Lesson::whereHas('results', function ($query) {
      $query->where('user_id', me()->id);
    })->get();

    return view('students.results.index', compact('lessons'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(Lesson $lesson)
  {
    $questions = $this->questionService->getWhere(
      wheres: [
        'lesson_id' => $lesson->id,
      ]
    )->get();

    return view('students.results.create', compact('lesson'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(ResultRequest $request)
  {
    $this->resultService->handleStoreData($request);
    return redirect(route('students.lessons.index'))->withSuccess(
      'Jawaban berhasil disubmit, Silahkan lihat di halaman detail materi'
    );
  }

  /**
   * Display the specified resource.
   */
  public function show(Lesson $lesson)
  {
    return view('students.results.show', compact('lesson'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Result $result)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Result $result)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Result $result)
  {
    //
  }
}
