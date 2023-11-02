<?php

namespace App\Services\Result;

use Illuminate\Http\Request;
use LaravelEasyRepository\BaseService;

interface ResultService extends BaseService
{
  public function getQuery();
  public function getWhere($wheres = [], $columns = '*', $comparisons = '=', $orderBy = null, $orderByType = null);
  public function handleStoreData(Request $request);
}
