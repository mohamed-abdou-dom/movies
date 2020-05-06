<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Http;
class ActorsController extends Controller
{
  public function index()
  {
    $actors = Http::withToken(config('services.tmdb.token'))
      ->get('https://api.themoviedb.org/3/person/popular')
      ->json()['results'];

    return view('actors.index',[
      'actors'=>$actors
    ]);
  }
}
