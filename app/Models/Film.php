<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $table = 'ms_film';
    protected $primaryKey = 'film_id';
    protected $guarded = [];
    public $timestamps = false;


    public function filmimages()
    {
        return $this->hasOne(FilmImages::class,'film_id','film_id');
    }

    public function categories()
    {
        return $this->hasOne(FilmCategories::class,'categories','category_id');
    }



}
