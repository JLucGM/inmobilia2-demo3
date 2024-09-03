<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TypeBusiness
 *
 * @property $id
 * @property $name
 * @property $created_at
 * @property $updated_at
 *
 * @property Product[] $products
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TypeBusiness extends Model
{
    
    static $rules = [
		'name' => 'required|string|max:255',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany('App\Models\Product', 'type_business_id', 'id');
    }
    

}
