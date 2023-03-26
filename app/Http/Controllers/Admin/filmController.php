<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Film;
use App\Models\FilmImages;
use Illuminate\Support\Facades\Http;

class filmController extends Controller
{


   public $url = 'https://api.themoviedb.org/3/trending/all/week?api_key=d3833d42b5abba5e0c60e0289e9095e8&language=tr-TR';
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

   public function getMovie()
   {
      return $this->data['results'];
   }


   public function index()
   {

      $film = Film::with('FilmImages')->get();

      return \view('Admin.film', \compact('film'));
   }


   public function create()
   {

      $a = $this->getMovie();

      foreach ($a as $key) {

         $film = new Film();
         $filmImages = new FilmImages();

         if (isset($key['title'])) {
            $title = $key['title'];
         } else {
            $title = $key['name'];
         }


         if (isset($key['release_date'])) {
            $date = $key['release_date'];
         } else {
            $date = $key['first_air_date'];
         }

         $c = Film::with('FilmImages')->where('film_id', $key['id'])->first();


         $posters = 'http://image.tmdb.org/t/p/w200'.$key['poster_path'];
         $backdrops = 'http://image.tmdb.org/t/p/w500'.$key['backdrop_path'];

         if (!$c) {
            $film->film_id = $key['id'];
            $film->title = $title;
            $film->content = $key['overview'];
            $film->vote = $key['vote_average'];
            $film->popularity = $key['popularity'];
            $film->release_date = $date;
            $film->save();

            $filmImages->film_id = $key['id'];
            $filmImages->posters = $posters;
            $filmImages->backdrops = $backdrops;
            $filmImages->save();
         }




      }

      return \redirect()->back();
   }

}
