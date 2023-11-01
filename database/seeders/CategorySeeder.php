<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $items = [
      "Do`a",
      'Tajwid',
      'Hafalan',
    ];

    foreach ($items as $item) :
      Category::firstOrCreate([
        'name' => $item,
      ]);
    endforeach;
  }
}
