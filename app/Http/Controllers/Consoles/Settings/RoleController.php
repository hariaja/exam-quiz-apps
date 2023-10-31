<?php

namespace App\Http\Controllers\Consoles\Settings;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Services\Role\RoleService;
use App\Http\Controllers\Controller;
use App\DataTables\Consoles\Settings\RoleDataTable;
use App\Http\Requests\Consoles\Settings\RoleRequest;
use App\Services\PermissionCategory\PermissionCategoryService;

class RoleController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct(
    protected RoleService $roleService,
    protected PermissionCategoryService $permissionCategoryService,
  ) {
    // 
  }

  /**
   * Display a listing of the resource.
   */
  public function index(RoleDataTable $dataTable)
  {
    return $dataTable->render('consoles.settings.roles.index');
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Role $role)
  {
    $permissions = $this->permissionCategoryService->with(
      with: [
        'permissions',
      ]
    )->get();
    $roleHasPermission = $this->roleService->getRoleHasPermissions($role->id);

    return view('consoles.settings.roles.edit', compact('role', 'roleHasPermission', 'permissions'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(RoleRequest $request, Role $role)
  {
    $this->roleService->handleUpdateRole($request, $role->id);
    return redirect(route('roles.index'))->withSuccess(trans('alert.update'));
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Role $role)
  {
    $this->roleService->delete($role->id);
    return response()->json([
      'message' => trans('alert.delete'),
    ], 200);
  }
}
