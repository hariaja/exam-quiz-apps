<?php

namespace App\Services\User;

use LaravelEasyRepository\Service;
use App\Repositories\User\UserRepository;

class UserServiceImplement extends Service implements UserService
{

  /**
   * don't change $this->mainRepository variable name
   * because used in extends service class
   */
  public function __construct(
    protected UserRepository $mainRepository
  ) {
    // 
  }

  // Define your custom methods :)
}
