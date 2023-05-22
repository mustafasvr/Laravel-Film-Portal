<?php

namespace App\Http\Controllers\Public\Film;

use App\Http\Controllers\Controller;
use App\Models\Film;
use App\Models\FilmCategories;
use Illuminate\Http\Request;

class FilmDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $id = $request->route('id');

        $film = Film::with('FilmImages')->where('film_id',$id)->first();


        $explode = explode(',',$film->categories);     
        
        $categories = [];

        
        foreach ($explode as $key)
        {
            $cat =  FilmCategories::where('category_id',$key)->first();
            $categories[$cat->category_name] = $cat;

        }

        return view('Public.Film.index',compact('film','categories'));
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
