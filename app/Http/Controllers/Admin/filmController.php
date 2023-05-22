<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Film;
use App\Models\FilmImages;
use Illuminate\Support\Facades\Http;

use function GuzzleHttp\json_encode;

class filmController extends Controller
{




   public function getMovie()
   {


      $page = 1;

      $parse = [];

      while ($page <= 20) {
         $url = 'https://api.themoviedb.org/3/discover/movie?api_key=d3833d42b5abba5e0c60e0289e9095e8&region=TR&language=tr-TR&primary_release_date.gte=2023-01-01&primary_release_date.lte=' . date('Y-m-d') . '&adult=false&page=' . $page;
         $data = file_get_contents($url);
         $parse[] = json_decode($data, true);
         $page++;
      }


      return $parse;
   }


   public function index()
   {

      $film = Film::with('FilmImages')->orderBy('release_date', 'desc')->get();

      return \view('Admin.film', \compact('film'));
   }


   public function create()
   {

      $a = $this->getMovie();


      foreach ($a as $wo => $item) {

         foreach ($item['results'] as $key) {


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


            $categories =  implode(',', $key['genre_ids']);

            if (!$c) {

               if($key['release_date'] <= date('Y-m-d'))

               if ($key['poster_path'] != null) {

                  if ($key['backdrop_path'] != null) {

                     if(Helper::isLatinAlphabet($title) == true)
                     {

                     $film->film_id = $key['id'];
                     $film->film_url = Helper::seo($title);
                     $film->title = $title;
                     $film->content = $key['overview'];
                     $film->categories = $categories;
                     $film->vote = $key['vote_average'];
                     $film->popularity = $key['popularity'];
                     $film->release_date = $date;
                     $film->save();

                     $posters = 'http://image.tmdb.org/t/p/w200' . $key['poster_path'];
                     if ($key['backdrop_path'] != null) {
                        $backdrops = 'http://image.tmdb.org/t/p/w300' . $key['backdrop_path'];
                     } else {
                        $backdrops = '';
                     }

                     $w1920 = 'https://image.tmdb.org/t/p/w1920_and_h800_multi_faces' . $key['backdrop_path'];
                     $orginal = 'https://image.tmdb.org/t/p/original'. $key['backdrop_path'];

                     $filmImages->film_id = $key['id'];
                     $filmImages->posters = $posters;
                     $filmImages->backdrops = $backdrops;
                     $filmImages->w1920 = $w1920;
                     $filmImages->orginal = $orginal;
                     $filmImages->save();

                  }

                  }
               }
            }
         }
      }

      return \redirect()->back();
   }
}
