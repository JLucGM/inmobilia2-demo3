<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class InfoWeb
 *
 * @property $id
 * @property $select_us
 * @property $sell_home
 * @property $rent_home
 * @property $buy_home
 * @property $marketing_free
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builders
 */
class InfoWeb extends Model
{

  public $table = 'info_web';
    
  static $rules = [
    'title_info' => 'required|string',
    'select_us' => 'required|string',
    'sell_home' => 'required|string',
    'rent_home' => 'required|string',
    'buy_home' => 'required|string',
    'marketing_free' => 'required|string',
];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
      'title_info',
    'select_us',
    'icon_first',
    'icon_second',
    'icon_thrid',
    'icon_fourth',
    'title_first'
    ,'title_second',
    'title_thrid',
    'title_fourth',
    'sell_home',
    'rent_home',
    'buy_home',
    'marketing_free',
    'title_anunciar',
    'description_anunciar',
  ];



}
