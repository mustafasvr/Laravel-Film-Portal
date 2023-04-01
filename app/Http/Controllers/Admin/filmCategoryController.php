<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\FilmCategories;
use Illuminate\Http\Request;

class filmCategoryController extends Controller
{

    public $url = 'https://api.themoviedb.org/3/genre/movie/list?api_key=d3833d42b5abba5e0c60e0289e9095e8&language=tr-TR';
    public $url2 = 'https://api.themoviedb.org/3/genre/tv/list?api_key=d3833d42b5abba5e0c60e0289e9095e8&language=tr-TR';
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
        $categories = FilmCategories::all();
        return \view('Admin.Categories.index',\compact('categories'));
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
           $filmCategories->category_url = Helper::seo($key['name']);
           
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
    public function edit($id)
    {

        if($category = FilmCategories::where('category_id',$id)->first())
        {
            return view('admin.Categories.edit',compact('category'));
        } else {
            return redirect()->route('admin.Categories.index');
        }


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $id = $request->route('id');

        $seourl = Helper::seo($request->category_name);

        $page=FilmCategories::where('category_id',$id)->update(
            [
                'category_name' => $request->category_name,
                'category_url' => $seourl,
                'category_desc' => $request->category_desc,
                'category_icon' => $request->category_icon
            ],
        );

        if ($page)
        {
            return redirect()->back()->with('success','Güncelleme işlemi başarılı');
            exit;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
