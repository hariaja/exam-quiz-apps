<?php

namespace App\Http\Controllers\Consoles\Exams;

use App\DataTables\Consoles\Exams\QuestionDataTable;
use App\Helpers\Enums\DecideType;
use App\Helpers\Enums\DifficultyType;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Consoles\Exams\QuestionRequest;
use App\Services\Lesson\LessonService;
use App\Services\Question\QuestionService;

use function Termwind\render;

class QuestionController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct(
    protected LessonService $lessonService,
    protected QuestionService $questionService,
  ) {
    // 
  }

  /**
   * Display a listing of the resource.
   */
  public function index(QuestionDataTable $dataTable)
  {
    return $dataTable->render('consoles.questions.index');
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $lessons = $this->lessonService->getWhere(
      wheres: [
        'status' => DecideType::ACTIVE->value,
      ]
    )->get();

    $difficulty = DifficultyType::toArray();

    return view('consoles.questions.create', compact('lessons', 'difficulty'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(QuestionRequest $request)
  {
    $this->questionService->create($request->validated());
    return redirect(route('questions.index'))->withSuccess(trans('alert.create'));
  }

  /**
   * Display the specified resource.
   */
  public function show(Question $question)
  {
    return view('consoles.questions.show', compact('question'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Question $question)
  {
    $lessons = $this->lessonService->getWhere(
      wheres: [
        'status' => DecideType::ACTIVE->value,
      ]
    )->get();

    $difficulty = DifficultyType::toArray();

    return view('consoles.questions.edit', compact('lessons', 'difficulty', 'question'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(QuestionRequest $request, Question $question)
  {
    $this->questionService->update($question->id, $request->validated());
    return redirect(route('questions.index'))->withSuccess(trans('alert.update'));
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Question $question)
  {
    $this->questionService->delete($question->id);
    return response()->json([
      'message' => trans('alert.delete')
    ]);
  }
}
