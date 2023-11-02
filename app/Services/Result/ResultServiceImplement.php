<?php

namespace App\Services\Result;

use App\Models\Result;
use Illuminate\Http\Request;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use LaravelEasyRepository\Service;
use Illuminate\Support\Facades\Log;
use App\Repositories\Result\ResultRepository;
use App\Repositories\Question\QuestionRepository;

class ResultServiceImplement extends Service implements ResultService
{

  /**
   * don't change $this->mainRepository variable name
   * because used in extends service class
   */
  public function __construct(
    protected ResultRepository $mainRepository,
    protected QuestionRepository $questionRepository,
  ) {
    // 
  }

  public function getQuery()
  {
    try {
      DB::beginTransaction();
      return $this->mainRepository->getQuery();
      DB::commit();
    } catch (\Exception $e) {
      DB::rollBack();
      Log::info($e->getMessage());
      throw new InvalidArgumentException(trans('alert.log.error'));
    }
  }

  public function getWhere($wheres = [], $columns = '*', $comparisons = '=', $orderBy = null, $orderByType = null)
  {
    try {
      DB::beginTransaction();
      return $this->mainRepository->getWhere(
        wheres: $wheres,
        columns: $columns,
        comparisons: $comparisons,
        orderBy: $orderBy,
        orderByType: $orderByType
      );
      DB::commit();
    } catch (\Exception $e) {
      DB::rollBack();
      Log::info($e->getMessage());
      throw new InvalidArgumentException(trans('alert.log.error'));
    }
  }

  public function handleStoreData($request)
  {
    try {
      DB::beginTransaction();

      $payload = $request->validated();

      foreach ($request->input('answers') as $questionId => $selectedOption) {
        $question = $this->questionRepository->findOrFail($questionId);

        if ($question && $selectedOption === $question->correct_option) {
          $point = $question->degree;
        } else {
          $point = 0;
        }

        $payload['user_id'] = me()->id;
        $payload['question_id'] = $questionId;
        $payload['student_answer'] = $selectedOption;
        $payload['point'] = $point;

        $this->mainRepository->create($payload);
      }

      DB::commit();
    } catch (\Exception $e) {
      DB::rollBack();
      Log::info($e->getMessage());
      throw new InvalidArgumentException(trans('alert.log.error'));
    }
  }
}
