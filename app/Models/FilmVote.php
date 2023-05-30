<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmVote extends Model
{
    use HasFactory;
    protected $table = 'ms_film_vote';
    protected $primaryKey = 'vote_id';
    protected $guarded = [];


    public function Film()
    {
        return $this->hasOne(Film::class,'film_id','film_id');
    }


}
