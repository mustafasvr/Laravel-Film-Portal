<?php

namespace App\Http\Controllers\Public\Film;

use App\Http\Controllers\Controller;
use App\Models\Film;
use App\Models\FilmCategories;
use App\Models\FilmComment;
use App\Models\User;
use Illuminate\Http\Request;

class FilmDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $id = $request->route('id');

        $film = Film::with('FilmImages')->where('film_id', $id)->first();


        $explode = explode(',', $film->categories);

        $categories = [];


        foreach ($explode as $key) {
            $cat =  FilmCategories::where('category_id', $key)->first();
            $categories[$cat->category_name] = $cat;
        }


        $comment = FilmComment::where('film_id', $id)->count();
        $comments = FilmComment::with('User')->where('film_id', $id)->get();



        return view('Public.Film.index', compact('film', 'categories', 'comment', 'comments'));
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

        $validatedData =  $request->validate([
            'user_id' => 'required|string',
            'comment' => 'required|string',
        ]);


        $film_id = $request->route('id');
        $film_url = $request->route('name');

        $film = Film::where('film_id', $film_id)->where('film_url', $film_url)->first();
        $user = User::where('token', $validatedData['user_id'])->first();

        if ($user) {
            if ($film) {
                $comment = new FilmComment();
                $comment->film_id = $film_id;
                $comment->user_id =  $user->user_id;
                $comment->comment_desc = $validatedData['comment'];
                $comment->comment_type = true;
                $comment->save();

                return redirect()->back()->with('success', 'Yorum gönderildi.');
            }
            return redirect()->back()->with('error', 'Bir hata oluştu');
        }
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
