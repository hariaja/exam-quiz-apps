<?php

namespace App\Repositories\Question;

use LaravelEasyRepository\Repository;

interface QuestionRepository extends Repository
{
  public function getQuery();
  public function getWhere($wheres = [], $columns = '*', $comparisons = '=', $orderBy = null, $orderByType = null);
}
