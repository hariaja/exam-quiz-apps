<?php

namespace App\Helpers\Enums;

use App\Traits\EnumsToArray;

enum DifficultyType: string
{
  use EnumsToArray;

  case EASY = "Mudah";
  case MEDIUM = "Sedang";
  case DIFFICULT = "Sulit";
}
