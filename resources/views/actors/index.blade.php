@extends('layouts.main')
@section('content')
  <div class="movie-home mt-5">
    <div class="container">
      <h1 class="popular">actors</h1>
      <div class="films mt-5">
        <div class="row">
          @foreach($actors as $actor)
          <div class="col-md-3">
            <div class="actor">
              <img src="https://image.tmdb.org/t/p/w200/{{$actor['profile_path']}}" alt="">
              <p class="text-white mt-2">{{$actor['name']}}</p>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
@endsection
