<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmVisitors extends Model
{
    use HasFactory;

    protected $table = 'ms_film_visitors';
    protected $primaryKey = 'id';
    protected $fillable = [
        'ip_address',
        'film_id',
        'user_agent',

    ];


    public function Film()
    {
        return $this->hasOne(Film::class,'film_id','film_id');
    }

    public function filmimages()
    {
        return $this->hasOne(FilmImages::class,'film_id','film_id');
    }



}
