<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paises extends Model
{
    use HasFactory;

    protected $table = 'paises';

    static $rules = [
      'name' => 'required|string|max:255',
    ];

    protected $fillable = [
        'name',
    ];

    // public function municipio()
    // {
    //     return $this->belongsTo(Municipio::class);
    // }
}
