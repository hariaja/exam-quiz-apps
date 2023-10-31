<?php

namespace App\Http\Controllers\Consoles\Settings;

use App\Models\User;
use App\Helpers\Helper;
use Illuminate\Http\Request;
use App\Helpers\Enums\RoleType;
use App\Services\Role\RoleService;
use App\Services\User\UserService;
use App\Http\Controllers\Controller;
use App\DataTables\Scopes\RoleFilter;
use App\DataTables\Scopes\StatusFilter;
use App\Helpers\Enums\AccountStatusType;
use App\DataTables\Consoles\Settings\UserDataTable;
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
   * Display a listing of the resource.
   */
  public function index(UserDataTable $dataTable, Request $request)
  {
    $roles = RoleType::toArray();
    $accountStatus = AccountStatusType::toArray();

    return $dataTable
      ->addScope(new RoleFilter($request))
      ->addScope(new StatusFilter($request))
      ->render('consoles.settings.users.index', compact(
        'roles',
        'accountStatus',
      ));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $roles = $this->roleService->getWhere(
      wheres: [
        'name' => RoleType::STUDENT->value
      ]
    )->get();

    return view('consoles.settings.users.create', compact('roles'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(UserRequest $request)
  {
    $this->userService->handleStoreData($request);
    return redirect(route('users.index'))->withSuccess(trans('alert.create'));
  }

  /**
   * Display the specified resource.
   */
  public function show(User $user)
  {
    return view('consoles.settings.users.show', compact('user'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(User $user)
  {
    $roles = $this->roleService->getWhere(
      wheres: [
        'name' => RoleType::STUDENT->value
      ]
    )->get();

    return view('consoles.settings.users.edit', compact('user', 'roles'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UserRequest $request, User $user)
  {
    $this->userService->handleUpdateData($request, $user->id);
    return Helper::redirectAfterUpdateUser($user);
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(User $user)
  {
    $this->userService->handleDeleteData($user->id);
    return response()->json([
      'message' => trans('session.delete'),
    ]);
  }

  /**
   * Update the specified status account data from storage.
   */
  public function status(User $user)
  {
    $this->userService->handleChangeStatus($user->id);
    return response()->json([
      'message' => trans('session.status'),
    ]);
  }
}
