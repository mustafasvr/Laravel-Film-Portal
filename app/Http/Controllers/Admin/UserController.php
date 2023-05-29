<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ImageController;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $users = User::all();


        return view('Admin.User.index',compact('users'));
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
    public function edit(string $name,string $id)
    {
        if($user = User::where('user_id',$id)->where('username',$name)->first())
        {
            return view('admin.user.edit',compact('user'));
        } else {
            return redirect()->route('admin.user.index');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $name = $request->route('name');
        $id = $request->route('id');


        $duser = User::where('username',$name)->where('user_id',$id)->first();



        if ($request->file()) {

            if($duser->picture != 'default.jpg')
            {
                ImageController::ImageDelete($duser->picture,'user');
            }
            
            $imageController = ImageController::ImageUpload($request->picture,'user');

            $page=User::where('username',$name)->where('user_id',$id)->update(
                [
                    'picture' => $imageController,
                    'username' => $request->username,
                    'email' => $request->email,
                    'permission' => $request->permission,
                    'user_state' => $request->user_state,
                ],
            );

        } else {

            $page=User::where('username',$name)->where('user_id',$id)->update(
                [
                    'username' => $request->username,
                    'email' => $request->email,
                    'permission' => $request->permission,
                    'user_state' => $request->user_state,
                ],
            );


        }
      

        if ($page)
        {
            return redirect()->back()->with('success','Güncelleme işlemi başarılı');
            exit;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id,string $name)
    {
        //
    }
}
