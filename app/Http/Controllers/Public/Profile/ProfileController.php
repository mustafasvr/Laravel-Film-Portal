<?php

namespace App\Http\Controllers\Public\Profile;

use App\Models\User;
use App\Models\FilmVote;
use App\Models\FilmComment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ImageController;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::where('user_id',Auth::user()->user_id)->first();
        $comment = FilmComment::where('user_id',$user->user_id)->count();
        $vote = FilmVote::where('user_id',$user->user_id)->count();
        return view('Public.Profile.index',compact('user','comment','vote'));
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
    

        $id = Auth::user()->user_id;
        $name = Auth::user()->username;

        $duser = User::where('username',$name)->where('user_id',$id)->first();

        if ($request->file()) {

            if($duser->picture != 'default.jpg')
            {
                ImageController::ImageDelete($duser->picture,'user');
            }
            
            $imageController = ImageController::ImageUpload($request->avatar,'user');

            $page=User::where('username',$name)->where('user_id',$id)->update(
                [
                    'picture' => $imageController,
                ],
            );

        }

        return redirect()->back()->with('success','Güncelleme işlemi başarılı');
        exit;

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
