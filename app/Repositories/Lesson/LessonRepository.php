<?php

namespace App\Repositories\Lesson;

use LaravelEasyRepository\Repository;

interface LessonRepository extends Repository
{
  public function getQuery();
  public function getWhere($wheres = [], $columns = '*', $comparisons = '=', $orderBy = null, $orderByType = null);
}
