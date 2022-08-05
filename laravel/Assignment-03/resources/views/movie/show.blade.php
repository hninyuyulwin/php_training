@extends('../layouts')
@section('content')
    <a href="{{route('movies.index')}}" class="btn btn-primary mb-3">Back</a>
    <div class="card">
        <div  class="card-header">
            <h3 class="text-success">Movies or Series Review</h3>
        </div>
        <div class="card-body">
            <div class="card-title"><h5>{{$movie->name}}</h5></div>
            <div class="card-text">{{$movie->description}}</div>
            <div class="card-text text-warning"><i>{{"Duration : ".$movie->duration}}</i></div>
            <div class="card-text text-danger"><i>{{"Genres : ".$movie->genres->name}}</i></div>
        </div>
    </div>
    
@endsection