<?php

namespace App\Http\Controllers\Public;

use App\Models\Film;
use Illuminate\Http\Request;
use App\Models\FilmCategories;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class indexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $film = Film::with('FilmImages')->orderBy('id','desc')->limit(7)->get();

        $filmlist = DB::table('ms_film')
            ->join('ms_film_categories', function($join){
                $join->on('ms_film.categories', 'LIKE', DB::raw("CONCAT('%', ms_film_categories.category_id, '%')"));
            })
            ->select('ms_film.title', DB::raw('GROUP_CONCAT(ms_film_categories.category_name SEPARATOR ", ") AS categories'))
            ->groupBy('ms_film.id')
            ->get();


        $categories = FilmCategories::all();

        return \view('Public.home',\compact('film','filmlist','categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
