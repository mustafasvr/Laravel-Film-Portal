<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FilmCategories;
use Illuminate\Http\Request;

class filmCategoryController extends Controller
{

    public $url = 'https://api.themoviedb.org/3/genre/movie/list?api_key=d3833d42b5abba5e0c60e0289e9095e8&language=tr-TR';
    public $data;
 
    public function __construct()
    {
       $this->data = \file_get_contents($this->url);
       $this->parser();
    }
 
    public function parser()
    {
       $this->data = \json_decode($this->data, true);
    }
 
    public function getCategories()
    {
       return $this->data['genres'];
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return \view('Admin.categories');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $categories = $this->getCategories();

       foreach($categories as $key)
       {

        $filmCategories = new FilmCategories();

        $c = FilmCategories::where('category_id', $key['id'])->first();

        if (!$c) {
           $filmCategories->category_id = $key['id'];
           $filmCategories->category_name = $key['name'];
           $filmCategories->save();
        }
       }

       return \redirect()->back();

       
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
