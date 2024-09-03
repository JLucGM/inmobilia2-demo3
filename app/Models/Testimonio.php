<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Testimonio
 *
 * @property $id
 * @property $name
 * @property $image
 * @property $testimonio
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Testimonio extends Model
{
    
    static $rules = [
		'name' => 'required|string|max:255',
		'image' => 'required',
		'testimonio' => 'required|string|max:255',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','image','testimonio'];



}
