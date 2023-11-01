<?php

namespace App\Services\Question;

use LaravelEasyRepository\BaseService;

interface QuestionService extends BaseService
{
  public function getQuery();
  public function getWhere($wheres = [], $columns = '*', $comparisons = '=', $orderBy = null, $orderByType = null);
}
