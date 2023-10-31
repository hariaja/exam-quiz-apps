<?php

namespace App\Repositories\Level;

use LaravelEasyRepository\Repository;

interface LevelRepository extends Repository
{
  public function getQuery();
  public function getWhere($wheres = [], $columns = '*', $comparisons = '=', $orderBy = null, $orderByType = null);
}
