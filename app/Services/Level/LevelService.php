<?php

namespace App\Services\Level;

use LaravelEasyRepository\BaseService;

interface LevelService extends BaseService
{
  public function getQuery();
  public function getWhere($wheres = [], $columns = '*', $comparisons = '=', $orderBy = null, $orderByType = null);
}
