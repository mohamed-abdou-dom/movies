<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Http;
class MoviesController extends Controller
{
    public function index()
    {
      $pmovies = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/movie/popular')
        ->json()['results'];

      $gmovies = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/genre/movie/list')
        ->json()['genres'];

      $genres = collect($gmovies)->mapWithKeys(function($genre){
        return [$genre['id'] => $genre['name']];
      });

      $nowplaying = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/movie/now_playing')
        ->json()['results'];


      return view('index',[
        'pmovies' => $pmovies,
        'genres' => $genres,
        'nowplaying' => $nowplaying
      ]);
    }

    public function show($id)
    {
      $movie = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/movie/'.$id.'?append_to_response=credits,videos,images')
        ->json();

      return view('single',[
        'movie' => $movie,
      ]);
    }

    public function search(Request $request)
    {
      $pmovies = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/search/movie?query='.$request->search)
        ->json()['results'];

      $gmovies = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/genre/movie/list')
        ->json()['genres'];

      $genres = collect($gmovies)->mapWithKeys(function($genre){
        return [$genre['id'] => $genre['name']];
      });

      $nowplaying = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/movie/now_playing')
        ->json()['results'];


      return view('index',[
        'pmovies' => $pmovies,
        'genres' => $genres,
        'nowplaying' => $nowplaying
      ]);
    }

}
