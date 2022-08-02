@extends('../layouts')
@section('content')
<div class="card">
        <div  class="card-header">
            <h3>Create Genre</h3>
        </div>
        <div class="card-body">
            <a href="/genres" class="btn btn-success mb-3">Back</a>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="/genres/upload" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Enter Genre Name :</label>
                    <input type="text" class="form-control" name="name" placeholder="Movie or Serie Name">
                </div><br>
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </form>
        </div>
    </div>
@endsection