<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmComment extends Model
{
    use HasFactory;

    protected $table = 'ms_film_comment';
    protected $primaryKey = 'comment_id';
    protected $guarded = [];    


    public function User()
    {
        return $this->hasOne(User::class,'user_id','user_id');
    }



}
