<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    // reset cahced roles and permission
    app()[PermissionRegistrar::class]->forgetCachedPermissions();

    $permissions = [
      // Halaman User
      'users.index',
      'users.create',
      'users.store',
      'users.show',
      'users.password',
      'users.edit',
      'users.update',
      'users.destroy',

      // Halaman Role
      'roles.index',
      'roles.edit',
      'roles.update',
      'roles.destroy',

      // Halaman level
      'levels.index',
      'levels.create',
      'levels.store',
      'levels.edit',
      'levels.update',
      'levels.destroy',

      // Halaman lesson
      'lessons.index',
      'lessons.create',
      'lessons.store',
      'lessons.show',
      'lessons.edit',
      'lessons.update',
      'lessons.destroy',

      // Halaman category
      'categories.index',
      'categories.create',
      'categories.store',
      'categories.edit',
      'categories.update',
      'categories.destroy',

      // Halaman question
      'questions.index',
      'questions.create',
      'questions.store',
      'questions.show',
      'questions.edit',
      'questions.update',
      'questions.destroy',
    ];

    $guardName = 'web';
    $permissionCategoryId = [
      'users' => 1,
      'roles' => 2,
      'levels' => 3,
      'lessons' => 4,
      'categories' => 5,
      'questions' => 6,
    ];

    // Masukkan atau simpan ke tabel permissions
    foreach ($permissions as $permission) :
      Permission::firstOrCreate([
        'name' => $permission,
        'permission_category_id' => $permissionCategoryId[explode('.', $permission)[0]],
        'guard_name' => $guardName,
        'created_at' => now(),
        'updated_at' => now(),
      ]);
    endforeach;
  }
}
