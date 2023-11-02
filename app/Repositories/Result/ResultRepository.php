<?php

namespace App\Repositories\Result;

use LaravelEasyRepository\Repository;

interface ResultRepository extends Repository
{
  public function getQuery();
  public function getWhere($wheres = [], $columns = '*', $comparisons = '=', $orderBy = null, $orderByType = null);
}
