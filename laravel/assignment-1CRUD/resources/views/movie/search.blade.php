@extends('../layouts')
@section('content')
    <a href="{{route('movies.index')}}" class="btn btn-primary mb-3">Back</a>
    <div class="card">
        <div  class="card-header">
            <h3 class="text-success">Showing Search Results</h3>
        </div>
        <div class="card-body">
            @foreach($name as $val)
            <div class="card-text">{{$val->name}}</div>
            @endforeach
        </div>
    </div>
    
@endsection