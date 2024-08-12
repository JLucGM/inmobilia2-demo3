<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Contacto
 *
 * @property $id
 * @property $name
 * @property $apellido
 * @property $email
 * @property $telefonoContacto1
 * @property $telefonoContacto2
 * @property $birthdate
 * @property $origen
 * @property $min_budget
 * @property $max_budget
 * @property $min_area
 * @property $max_area
 * @property $tipo_propiedad_id
 * @property $bedrooms
 * @property $bathrooms
 * @property $garage
 * @property $pais
 * @property $region
 * @property $ciudad
 * @property $direccion
 * @property $observaciones
 * @property $created_at
 * @property $updated_at
 *
 * @property ContactosPropiedad[] $contactosPropiedads
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Contacto extends Model
{

  static $rules = [
    'name' => 'required',
    'apellido' => 'required',
    'email' => 'required',
    'telefonoContacto1' => 'required',
    'direccion' => 'required',
    'observaciones' => 'required',
    'pais' => 'required',
    'region' => 'required',
    'ciudad' => 'required',
  ];

  protected $perPage = 20;

  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name',
    'apellido',
    'email',
    'telefonoContacto1',
    'telefonoContacto2',
    'birthdate',
    'origen',
    'min_budget',
    'max_budget',
    'min_area',
    'max_area',
    'tipoPropiedad_id',
    'bedrooms',
    'bathrooms',
    'garage',
    'pais',
    'region',
    'ciudad',
    'direccion',
    'observaciones',
    'user_id',
    'vendedorAgente_id',
    'customer_type_id',
    'status_contact_id',
    'origins_id',
  ];

  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function contactosPropiedads()
  {
    return $this->hasMany('App\Models\ContactosPropiedad', 'contacto_id', 'id');
  }

  public function user()
  {
    return $this->belongsTo('App\Models\User', 'user_id', 'id');
  }

  public function vendedorAgente()
  {
    return $this->belongsTo('App\Models\User', 'vendedorAgente_id', 'id');
  }

  public function tipoPropiedad()
  {
    return $this->belongsTo('App\Models\TipoPropiedad', 'tipoPropiedad_id', 'id');
  }

  public function customerType()
    {
        return $this->belongsTo('App\Models\CustomerType', 'customer_type_id', 'id');
    }

    public function statusContact()
    {
        return $this->belongsTo('App\Models\StatusContact', 'status_contact_id', 'id');
    }

    public function origins()
    {
        return $this->belongsTo('App\Models\Origin', 'origins_id', 'id');
    }
}