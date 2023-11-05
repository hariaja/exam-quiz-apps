<?php

namespace App\Services\Lesson;

use App\Helpers\Helper;
use Illuminate\Support\Str;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use LaravelEasyRepository\Service;
use Illuminate\Support\Facades\Log;
use App\Repositories\Lesson\LessonRepository;
use Illuminate\Support\Facades\Storage;

class LessonServiceImplement extends Service implements LessonService
{

  /**
   * don't change $this->mainRepository variable name
   * because used in extends service class
   */
  public function __construct(
    protected LessonRepository $mainRepository
  ) {
    // 
  }

  public function getQuery()
  {
    try {
      DB::beginTransaction();
      return $this->mainRepository->getQuery();
      DB::commit();
    } catch (\Exception $e) {
      DB::rollBack();
      Log::info($e->getMessage());
      throw new InvalidArgumentException(trans('alert.log.error'));
    }
  }

  public function getWhere($wheres = [], $columns = '*', $comparisons = '=', $orderBy = null, $orderByType = null)
  {
    try {
      DB::beginTransaction();
      return $this->mainRepository->getWhere(
        wheres: $wheres,
        columns: $columns,
        comparisons: $comparisons,
        orderBy: $orderBy,
        orderByType: $orderByType
      );
      DB::commit();
    } catch (\Exception $e) {
      DB::rollBack();
      Log::info($e->getMessage());
      throw new InvalidArgumentException(trans('alert.log.error'));
    }
  }

  public function getDataByUserResult($userResults = [], $columns = '*')
  {
    try {
      DB::beginTransaction();
      return $this->mainRepository->getDataByUserResult(
        userResults: $userResults,
        columns: $columns,
      );
      DB::commit();
    } catch (\Exception $e) {
      DB::rollBack();
      Log::info($e->getMessage());
      throw new InvalidArgumentException(trans('alert.log.error'));
    }
  }

  public function handleStoreData($request)
  {
    try {
      DB::beginTransaction();

      $payload = $request->validated();

      // Upload file
      // Path
      $path = "images/lessons";
      $banner = Helper::uploadFile($request, $path, null);

      // Custom request
      $payload['banner'] = $banner;
      $payload['excerpt'] = Str::limit(strip_tags($request->description), 200);

      // Store Data
      $this->mainRepository->create($payload);

      DB::commit();
    } catch (\Exception $e) {
      DB::rollBack();
      Log::info($e->getMessage());
      throw new InvalidArgumentException(trans('alert.log.error'));
    }
  }

  public function handleUpdateData($request, $id)
  {
    try {
      DB::beginTransaction();

      // Find lesson data by id
      $lesson = $this->mainRepository->findOrFail($id);

      // Prepare payload
      $payload = $request->validated();

      // Upload File, prepare path and delete old images
      $path = "images/lessons";
      $banner = Helper::uploadFile($request, $path, $lesson->banner);

      $payload['banner'] = $banner;

      // Update data
      $this->mainRepository->update($lesson->id, $payload);

      DB::commit();
    } catch (\Exception $e) {
      DB::rollBack();
      Log::info($e->getMessage());
      throw new InvalidArgumentException(trans('alert.log.error'));
    }
  }

  public function handleDeleteData(int $id)
  {
    try {
      DB::beginTransaction();

      // Find lesson data by id
      $lesson = $this->mainRepository->findOrFail($id);

      // Check image, if exist delete first from storage
      if ($lesson->banner) {
        Storage::delete($lesson->banner);
      }

      // Delete data from database
      $this->mainRepository->delete($lesson->id);

      DB::commit();
    } catch (\Exception $e) {
      DB::rollBack();
      Log::info($e->getMessage());
      throw new InvalidArgumentException(trans('alert.log.error'));
    }
  }
}
