<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;

class Lesson extends Model
{
  use HasFactory, Uuid;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'uuid',
    'level_id',
    'title',
    'excerpt',
    'banner',
    'video_link',
    'description',
    'status',
  ];

  /**
   * Get the route key for the model.
   */
  public function getRouteKeyName(): string
  {
    return 'uuid';
  }

  /**
   * Declar status label.
   *
   * @return Attribute
   */
  public function statusLabel(): Attribute
  {
    $statusLabel = [
      0 => "<span class='badge text-danger'>Inactive</span>",
      1 => "<span class='badge text-success'>Active</span>",
    ];

    return Attribute::make(
      get: fn () => $statusLabel[$this->status] ?? 'Tidak Diketahui',
    );
  }

  /**
   * Scope a query to only include active users.
   */
  public function scopeActive($data)
  {
    return $data->where('status', true);
  }

  public function getActive(): Collection
  {
    return $this->active()->get();
  }

  public function getLessonBanner()
  {
    if (!$this->banner) {
      return 'https://placehold.co/1080x600/bdc3c7/FFFFFF.png';
    }

    return Storage::url($this->banner);
  }

  /**
   * Relation to Level model
   *
   * @return BelongsTo
   */
  public function level(): BelongsTo
  {
    return $this->belongsTo(Level::class, 'level_id');
  }
}
