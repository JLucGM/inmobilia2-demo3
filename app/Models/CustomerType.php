<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CustomerType
 *
 * @property $id
 * @property $name
 * @property $created_at
 * @property $updated_at
 *
 * @property Contacto[] $contactos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class CustomerType extends Model
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
    public function contactos()
    {
        return $this->hasMany('App\Models\Contacto', 'customer_type_id', 'id');
    }
    

}
