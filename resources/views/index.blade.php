@extends('layouts.main')
@section('content')
  <div class="movie-home mt-5">
    <div class="container">
      <h1 class="popular">popular movies</h1>
      <div class="films mt-5">
        <div class="row">
          @foreach($pmovies as $movie)
            @if(!empty($movie['poster_path']))
              <x-movie-card :movie="$movie" :genres="$genres"/>
            @endif
          @endforeach
        </div>
      </div>
      <hr>
      <h1 class="popular mt-5">Now Playing</h1>
      <div class="films mt-5">
        <div class="row">
          @foreach($nowplaying as $movie)
            @if(!empty($movie['poster_path']))
              <x-movie-card :movie="$movie" :genres="$genres"/>
            @endif
          @endforeach
        </div>
      </div>
    </div>
  </div>
@endsection
