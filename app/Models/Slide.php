<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * Class Slide
 *
 * @property $id
 * @property $image
 * @property $active
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Slide extends Model implements HasMedia
{
  use InteractsWithMedia;
  static $rules = [
    'image' => 'required|mimetypes:image/jpeg,image/png,image/jpg,video/mp4,video/avi,video/mov,video/wmv',
    //'image' => 'required|mimes:jpeg,png,jpg',
    'title' => 'required',
    'texto' => 'required',
    'link' => 'nullable|url',


  ];

  protected $perPage = 20;

  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['image', 'active', 'texto', 'title', 'link'];


  public function registerMediaConversions(?Media $media = null): void
  {
    $this->addMediaConversion('thumb')
      ->width(368)
      ->height(232);
  }
}
