@extends('../layouts')
@section('content')
    <a href="/file-import" class="btn btn-info btn-sm mb-4">Import or Export File</a>
    <div class="card">
        <div  class="card-header">
            <h3>Movies & Series Lists</h3>
        </div>
        <div class="card-body">
            <a href="/movies/create" class="btn btn-primary">Create</a>
            <div style="float:right">
                <a href="/genres" class="btn btn-success">Go to See Genre Page</a>
            </div>
            <table class="table table-striped mt-3">
                <tr>
                    <th>Movie Name</th>
                    <th>Desciption</th>
                    <th>Duration</th>
                    <th>Genre</th>
                    <th>Actions</th>
                </tr>
                @foreach($movie as $mov)
                    <tr>
                        <td>{{$mov->name}}</td>
                        <td>{{Str::limit($mov->description)}}
                        <br>
                        <a href="/movies/{{$mov->id}}" class="btn btn-sm btn-success mt-2">Read more</a>
                        </td>
                        <td>{{$mov->duration}}</td>
                        <td>{{$mov->genres->name}}</td>
                        <td>
                            <a href="/movies/{{$mov->id}}/edit" class="btn btn-warning btn-sm">Edit</a><br>
                            <form action="/movies/{{$mov->id}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Are you sure want to delete?')" type="submit" class="btn btn-danger btn-sm mt-2">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection