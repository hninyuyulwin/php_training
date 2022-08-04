@extends('../layouts')
@section('content')
<a href="{{route('movies.index')}}" class="btn btn-primary mb-3">Back</a>
    <div class="card">
        <div  class="card-header">
            <h3>Edit Movies & Series</h3>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <form action="{{route('movies.update',$movie->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Enter Movie or Serie Name :</label>
                    <input value="{{$movie->name}}" type="text" class="form-control" name="name" placeholder="Movie or Serie Name">
                </div><br>
                <div class="form-group">
                    <label for="">Description :</label>
                    <textarea name="description" class="form-control" rows="5">{{$movie->description}}</textarea>
                </div><br>
                <div class="form-group">
                    <label for="">Duration :</label>
                    <input value="{{$movie->duration}}" type="text" class="form-control" name="duration" placeholder="Movie or Serie Duration">
                </div><br>
                <div class="form-group">
                    <select name="genre" class="form-control">
                        <option value="">Choose Movie Genre</option>
                        @foreach($genres as $val)
                            <option value="{{$val->id}}" {{$val->id == $movie->genre_id ? 'selected' : ''}}>{{$val->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success mt-3">Update</button>
            </form>
        </div>
    </div>
@endsection