<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;


    static $rules = [
        'name' => 'required',
        'agenteVendedor_id' => 'required',
        'price' => 'required',
        'description' => 'required',
        //'details' => 'required',
        'dormitorios' => 'required',
        //'ambientes' => 'required',
        'toilet' => 'required',
        'cocheras' => 'required',
        'metrosCuadradosC' => 'required',
        'metrosCuadradosT' => 'required',
        //'expensas' => 'required',
        'portada' => 'required',
        'image' => 'required',
        'pais' => 'required',
        'region' => 'required',
        'ciudad' => 'required',
        'latitud' => 'required',
        'longitud' => 'required',
        'direccion' => 'required',

    ];
    public $table = 'products';

    public $fillable = [
        'name',
        'price',
        'description',
        'details',
        'portada',
        'publicar',
        'dormitorios',
        'ambientes',
        'toilet',
        'metrosCuadradosT',
        'metrosCuadradosC',
        'estrenar',
        'expensas',
        'cocheras',
        //  'videoTipo',
        //  'linkVideo',
        'pais',
        'region',
        'ciudad',
        'latitud',
        'longitud',
        'direccion',
        'tipoPropiedad_id',
        'destacado',
        'publicarPrecio',
        'type_business_id',
        'phy_state_id',
    ];


    public function scopeOrdenar($query, $orden)
    {
        if ($orden) {
            return $query->orderBy('id', 'desc');
        }
    }
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(150)
            ->height(150)
            ->sharpen(10);
    }

    public function agente()
    {
        return $this->hasOne('App\Models\PropiedadAgente', 'product_id', 'id');
    }

    public function usuarios()
    {
        return $this->belongsToMany(User::class, 'propiedad_agente', 'product_id', 'user_id');
    }


    public function tipopropiedad()
    {
        return $this->hasOne('App\Models\TipoPropiedad', 'id', 'tipoPropiedad_id');
    }

    public function region()
    {
        return $this->hasOne('App\Models\Estado', 'id', 'region');
    }
    public function paises()
    {
        return $this->hasOne('App\Models\Paises', 'id', 'pais');
    }
    public function ciudad()
    {
        return $this->hasOne('App\Models\Ciudades', 'id', 'ciudad');
    }

    public function amenities()
    {
        return $this->hasMany('App\Models\PropiedadAmenities', 'product_id', 'id');
    }

    public function typeBusiness()
    {
        return $this->belongsTo('App\Models\TypeBusiness', 'type_business_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function phyState()
    {
        return $this->belongsTo('App\Models\PhyState', 'phy_state_id', 'id');
    }

    public function contactosPropiedads()
    {
        return $this->hasMany('App\Models\ContactosPropiedad', 'product_id', 'id');
    }

    public function contactos()
    {
        return $this->hasManyThrough(Contacto::class, ContactosPropiedad::class, 'product_id', 'id', 'id', 'contacto_id');
    }
}
