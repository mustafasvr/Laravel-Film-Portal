<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Film;
use App\Models\FilmCategories;
use Illuminate\Http\Request;

class categoriesController extends Controller
{
    public function index(Request $request)
    {

        $group = $request->route('group');

        $film = [];


        $filmc = Film::with(['FilmImages' => function($query) {
            $query->whereNotNull('posters');
        }])
        ->join('ms_film_images', 'ms_film.film_id', '=', 'ms_film_images.film_id')
        ->orderBy('release_date', 'desc')
        ->get();


        $kategori = FilmCategories::where('category_url', $group)->first();

        foreach ($filmc as $key) {
            $explode = explode(',', $key->categories);


            if ($have = in_array($kategori->category_id, $explode)) {
                $film[] =  [
                    "film" => $key
                ];
            }
        }



        return \view('Public.Categories.index', \compact('film', 'kategori'));
    }
}
