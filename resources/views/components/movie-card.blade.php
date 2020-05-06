<div class="col-md-3">
  <div class="card mb-5">
    <a href="/show/{{$movie['id']}}">
      <img src="https://image.tmdb.org/t/p/w500/{{$movie['poster_path']}}" class="card-img-top" alt="...">
    </a>
    <div class="card-body">
      <h5 class="card-title">{{$movie['title']}}</h5>
      <div class="details">
        <span><i class="fa fa-star"></i> </span><span> {{ $movie['vote_average'] * 10 .'%'}} </span> | <span> {{ \carbon\carbon::parse($movie['release_date'])->format('M D ,Y') }}</span>
        <br>
        @foreach($movie['genre_ids'] as $genre)
        @if($loop->index<3)
        <span class="ml-1">
          {{ $genres->get($genre) }}
        </span>
        @endif
        @endforeach
      </div>
    </div>
  </div>
</div>
