<?php

namespace App\Http\Controllers\Public\Film;

use App\Models\Film;
use App\Models\User;
use App\Models\FilmVote;
use App\Models\FilmComment;
use Illuminate\Http\Request;
use App\Models\FilmCategories;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FilmDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $id = $request->route('id');

        $film = Film::with('FilmImages')->where('film_id', $id)->first();


  

        $voteC = FilmVote::where('film_id',$id)->count();
        $voteS = FilmVote::where('film_id',$id)->avg('vote_score');


        $explode = explode(',', $film->categories);

        $categories = [];


        foreach ($explode as $key) {
            $cat =  FilmCategories::where('category_id', $key)->first();
            $categories[$cat->category_name] = $cat;
        }


        $comment = FilmComment::where('film_id', $id)->count();
        $comments = FilmComment::with('User')->where('film_id', $id)->get();


        if(Auth::user()) {
            $vote = FilmVote::where('film_id',$id)->where('user_id',Auth::user()->user_id)->first();
            return view('Public.Film.index', compact('film', 'categories', 'comment', 'comments','vote','voteC','voteS'));
        } else {
            return view('Public.Film.index', compact('film', 'categories', 'comment', 'comments','voteC','voteS'));
        }

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
        $film_id = $request->route('id');
        $film_url = $request->route('name');

        $validatedData =  $request->validate([
            'user_id' => 'required|string',
            'comment' => 'required|string',
            'comment_vote' => 'int',
        ]);


        $film = Film::where('film_id', $film_id)->where('film_url', $film_url)->first();
        $user = User::where('token', $validatedData['user_id'])->first();


        if(isset($validatedData['comment_vote'])) {
        if($validatedData['comment_vote'] != 0)
        {

            $vote = FilmVote::where('user_id',$validatedData['user_id'])->where('film_id',$film_id)->first();

            if(!$vote) {
                $votes = new FilmVote();
                $votes->film_id = $film_id;
                $votes->user_id =  $user->user_id;
                $votes->vote_score = $validatedData['comment_vote'];
                $votes->vote_status = true;
                $votes->save();
            } 

        }
    }

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
