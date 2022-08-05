@extends('../layouts')
@section('content')
    @if(session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
    @endif
    <div class="card">
        <div  class="card-header">
            <h3>Genres List</h3>
        </div>
        <div class="card-body">
            <a href="{{route('genres.create')}}" class="btn btn-primary">Create</a>
            <div style="float:right">
                <a href="{{route('movies.index')}}" class="btn btn-success">Go to See Movies & Series List</a>
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
                            <a href="{{route('genres.edit',$gen->id)}}" class="btn btn-warning btn-sm">Edit</a><br>
                            <form action="{{route('genres.destroy',$gen->id)}}" method="post">
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