<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Popup
 *
 * @property $id
 * @property $title
 * @property $description
 * @property $image
 * @property $url
 * @property $active
 * @property $start_date
 * @property $end_date
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Popup extends Model
{
    
    static $rules = [
		'title' => 'required',
		'description' => 'required',
		'image' => 'required',
		'url' => 'required',
		'active' => 'required',
		'start_date' => 'required',
		'end_date' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title','description','image','url','active','start_date','end_date'];



}
