@extends('../layouts')
@section('content')
<div class="card">
        <div  class="card-header">
            <h3>Create Movies & Series</h3>
        </div>
        <div class="card-body">
            <a href="{{route('movies.index')}}" class="btn btn-success mb-3">Back</a>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <form action="{{route('movies.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Enter Movie or Serie Name :</label>
                    <input type="text" class="form-control" name="name" placeholder="Movie or Serie Name">
                </div><br>
                <div class="form-group">
                    <label for="">Description :</label>
                    <textarea name="description" class="form-control" rows="5"></textarea>
                </div><br>
                <div class="form-group">
                    <label for="">Duration :</label>
                    <input type="text" class="form-control" name="duration" placeholder="Movie or Serie Duration">
                </div><br>
                <div class="form-group">
                    <select name="genre" class="form-control">
                        <option value="">Choose Movie Genre</option>
                        @foreach($genres as $val)
                            <option value="{{$val->id}}">{{$val->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </form>
        </div>
    </div>
@endsection