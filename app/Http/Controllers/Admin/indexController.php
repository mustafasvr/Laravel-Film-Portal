<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Film;
use App\Models\FilmComment;
use App\Models\User;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index()
    {
        $film = Film::count();
        $user = User::count();
        $filmComment = FilmComment::count();
        
        return view('Admin.home',compact('film','user','filmComment'));
    }
}
