<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $items = [
      'Sekolah Dasar',
      'Sekolah Menengah Pertama',
      'Sekolah Menengah Atas',
    ];

    foreach ($items as $item) :
      Level::firstOrCreate([
        'name' => $item,
      ]);
    endforeach;
  }
}
