<?php

namespace App\Repositories\Lesson;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Lesson;

class LessonRepositoryImplement extends Eloquent implements LessonRepository
{
  /**
   * Model class to be used in this repository for the common methods inside Eloquent
   * Don't remove or change $this->model variable name
   * @property Model|mixed $model;
   */
  public function __construct(
    protected Lesson $model
  ) {
    // 
  }

  public function getQuery()
  {
    return $this->model->query();
  }

  public function getWhere($wheres = [], $columns = '*', $comparisons = '=', $orderBy = null, $orderByType = null)
  {
    $data = $this->model->select($columns);

    if (!empty($wheres)) {
      foreach ($wheres as $key => $value) {
        if (is_array($value)) {
          $data = $data->whereIn($key, $value);
        } else {
          $data = $data->where($key, $comparisons, $value);
        }
      }
    }

    if ($orderBy) {
      $data = $data->orderBy($orderBy, $orderByType);
    }

    return $data;
  }

  public function getDataByUserResult($userResults = [], $columns = '*')
  {
    $data = $this->model->select($columns)
      ->join('questions', 'lessons.id', '=', 'questions.lesson_id')
      ->whereIn('questions.id', $userResults);

    return $data;
  }
}
