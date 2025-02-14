<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    static $rules = [
        'name' => 'required|string|max:255',
        'status' => 'required|in:1,2',
        'extract' => 'required|max:150',
        'img' => 'required|image',
    ];

    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $dateformat = 'd-m-y';

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {

        return $this->belongsTo(User::class);
    }
    public function comments()
    {

        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }



    public function category()
    {

        return $this->belongsTo(Categorias::class);
    }

    //Relacion de mucho a Muchos


    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
