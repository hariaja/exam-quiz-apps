<?php

namespace App\Http\Controllers\Students;

use App\Models\User;
use App\Helpers\Helper;
use Illuminate\Http\Request;
use App\Helpers\Enums\RoleType;
use App\Services\Role\RoleService;
use App\Services\User\UserService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Consoles\Settings\UserRequest;

class UserController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct(
    protected UserService $userService,
    protected RoleService $roleService,
  ) {
    // 
  }

  /**
   * Display the specified resource.
   */
  public function show(User $user)
  {
    $roles = $this->roleService->getWhere(
      wheres: [
        'name' => RoleType::STUDENT->value
      ]
    )->get();

    return view('students.users.show', compact('user', 'roles'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UserRequest $request, User $user)
  {
    $this->userService->handleUpdateData($request, $user->id);
    return Helper::redirectAfterUpdateUser($user);
  }
}
