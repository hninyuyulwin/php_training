@extends('../layouts')
@section('content')
    <div class="card">
        <div  class="card-header">
            <h3>Genres List</h3>
        </div>
        <div class="card-body">
            <a href="/genres/create" class="btn btn-primary">Create</a>
            <div style="float:right">
                <a href="/movies" class="btn btn-success">Go to See Movies & Series List</a>
            </div>
            <table class="table table-striped mt-3">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
                @foreach($genre as $gen)
                    <tr>
                        <td>{{$gen->id}}</td>
                        <td>{{$gen->name}}</td>
                        <td>
                            <a href="/genres/{{$gen->id}}/edit" class="btn btn-warning btn-sm">Edit</a><br>
                            <form action="/genres/{{$gen->id}}" method="post">
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