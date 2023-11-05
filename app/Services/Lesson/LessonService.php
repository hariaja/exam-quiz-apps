<?php

namespace App\Services\Lesson;

use Illuminate\Http\Request;
use LaravelEasyRepository\BaseService;

interface LessonService extends BaseService
{
  public function getQuery();
  public function getWhere($wheres = [], $columns = '*', $comparisons = '=', $orderBy = null, $orderByType = null);
  public function handleStoreData(Request $request);
  public function handleUpdateData(Request $request, int $id);
  public function handleDeleteData(int $id);
  public function getDataByUserResult($userResults = [], $columns = '*');
}
