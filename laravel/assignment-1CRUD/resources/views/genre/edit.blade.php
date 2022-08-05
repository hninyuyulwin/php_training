@extends('../layouts')
@section('content')
<a href="{{route('genres.index')}}" class="btn btn-primary mb-3">Back</a>
    <div class="card">
        <div  class="card-header">
            <h3>Edit Genre</h3>
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
            <form action="{{route('genres.update',$genre->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Enter Genre Name :</label>
                    <input value="{{$genre->name}}" type="text" class="form-control" name="name" placeholder="Movie or Serie Name">
                </div><br>
                <button type="submit" class="btn btn-success mt-3">Update</button>
            </form>
        </div>
    </div>
@endsection