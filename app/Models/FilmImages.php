<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmImages extends Model
{
    use HasFactory;
    protected $table = 'ms_film_images';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
