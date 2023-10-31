<?php

namespace App\Services\Role;

use Illuminate\Http\Request;
use LaravelEasyRepository\BaseService;

interface RoleService extends BaseService
{
  public function getQuery();
  public function getRoleHasPermissions($id);
  public function handleUpdateRole(Request $request, int $id);
  public function getWhere($wheres = [], $columns = '*', $comparisons = '=', $orderBy = null, $orderByType = null);
}
