<?php

namespace App\Http\Controllers\Public;

use App\Models\Film;
use Illuminate\Http\Request;
use App\Models\FilmCategories;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\FilmVisitors;
use App\Models\FilmVote;

class indexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $film = Film::with('FilmImages')->orderBy('release_date','desc')->limit(7)->get();

   

        $categories = FilmCategories::all();

        $kategori = [];

        foreach($categories as $cat)
        {
            $filmc = Film::with('FilmImages')
            ->with(['filmComment' => function ($query) {
                $query->latestComment();
            }])
            ->orderBy('release_date', 'desc')
            ->get();

            
            foreach ($filmc as $key)
            {
                $explode = explode(',',$key->categories);        
                if($have = in_array($cat->category_id,$explode))
                {
                    $kategori[$cat->category_url]['film'][] = $key;
                    $kategori[$cat->category_url]['category'] = $cat;


                    $kategori[$cat->category_url]['count'] =  [
                        "sayi" => count($kategori[$cat->category_url]['film'])
                    ];

                } 

            }
         
        }
   


        return \view('Public.home',\compact('film','kategori'));
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
