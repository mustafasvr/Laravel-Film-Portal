<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmCategories extends Model
{
    use HasFactory;
    protected $table = 'ms_film_categories';
    protected $primaryKey = 'id';
    protected $guarded = [];


}
