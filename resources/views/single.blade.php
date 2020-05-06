@extends('layouts.main')
@section('content')

  <div class="movie-home mt-5">
    <div class="container">
      <div class="films mt-5">
        <div class="row">
          <div class="col-md-4">
            <img src="https://image.tmdb.org/t/p/w500/{{$movie['poster_path']}}" width="80%" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h1 class="card-title">{{$movie['original_title']}}</h1>
              <div class="details">
                <span><i class="fa fa-star"></i> </span><span> {{ $movie['vote_average'] * 10 .'%'}} </span> | <span> {{ \carbon\carbon::parse($movie['release_date'])->format('M D ,Y') }}</span> |
                @foreach($movie['genres'] as $genre)
                <span class="ml-1">
                  {{ $genre['name'] }}
                </span>
                @endforeach
                <p class="mt-5">{{$movie['overview']}}</p>
                <div class="crew mt-5">
                  <h6>Feature Crew</h6>
                  @foreach($movie['credits']['crew'] as $crew)
                    @if($loop->index<2)
                      <span class="mr-5">{{$crew['name']}}</span><span>{{$crew['job']}}</span><br>
                    @endif
                  @endforeach
                </div>
                @if(!empty($movie['videos']['results'][0]['key']))
                  <a href="https://youtube.com/watch?v={{$movie['videos']['results'][0]['key']}}" type="button" class="mt-5 btn btn-success btn-lg" name="button"><i class="fa fa-play-circle"></i> Play Trailer</a>
                @else
                  <p class="mt-5" style="text-transform:capitalize;color: white">there is no trailer for this film</p>
                @endif
              </div>
            </div>
          </div>
        </div>
        <hr>
        <div class="cast">
          <h1 class="mt-5 mb-5" style="color: white;font-size: 48px;text-transform: capitalize;">cast</h1>
          <div class="row">
            @foreach($movie['credits']['cast'] as $cast)
            @if(!empty($cast['profile_path']))
              @if($loop->index<6)
                <div class="col">
                  <div class="card">
                    <img src="https://image.tmdb.org/t/p/w500/{{$cast['profile_path']}}" class="card-img-top" alt="/images/film.jpg">
                    <div class="card-body">
                      <h5 class="card-title">{{$cast['name']}}</h5>
                      <h6 class="card-title">{{$cast['character']}}</h6>
                    </div>
                  </div>
                </div>
                @endif
            @endif
            @endforeach
          </div>
        </div>
        <hr>
        <div class="images">
          <h1 class="mt-5 mb-5" style="color: white;font-size: 48px;text-transform: capitalize;">images</h1>
          <div class="row">
            @foreach($movie['images']['backdrops'] as $img)
            @if(!empty($img['file_path']) && $loop->index<9)
              <div class="col-md-4">
                <div class="card mb-5">
                  <img src="https://image.tmdb.org/t/p/w500/{{$img['file_path']}}" class="card-img-top" alt="/images/film.jpg">
                </div>
              </div>
            @endif
            @endforeach
          </div>
          <hr>
          <h1 class="mt-5 mb-5" style="color: white;font-size: 48px;text-transform: capitalize;">posters</h1>
          <div class="row">
            @foreach($movie['images']['posters'] as $img)
              @if(!empty($img['file_path']) && $loop->index<3)
                <div class="col-md-4">
                  <div class="card mb-5">
                    <img src="https://image.tmdb.org/t/p/w500/{{$img['file_path']}}" class="card-img-top" alt="/images/film.jpg">
                  </div>
                </div>
              @endif
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
