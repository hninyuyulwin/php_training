@extends('../layouts')
@section('content')
    <a href="{{route('import-view')}}" class="btn btn-info btn-sm mb-4">Import or Export File</a>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="row my-3">        
            <form action="{{route('movies-search')}}" method="post">
            @csrf
            <div class="row">
                <div class="form-group col-3">
                    <input type="text" class="form-control" name="namesearch" placeholder="Search Name">
                </div>
                <div class="form-group col-3">
                    <input type="text" class="form-control" name="decsearch" placeholder="Search Description">
                </div>
                <div class="form-group col-3">
                    <input type="text" class="form-control" name="startdate" placeholder="Start Date">
                </div>
                <div class="form-group col-3">
                    <input type="text" class="form-control" name="enddate" placeholder="End Date">
                </div>
            </div>
            <button type="submit" class="btn btn-secondary mt-3">Search</button>
        </form>
    </div>
    <div class="card">
        <div  class="card-header">
            <h3>Movies & Series Lists</h3>
        </div>
        <div class="card-body">
            <a href="{{route('movies.create')}}" class="btn btn-primary">Create</a>
            <div style="float:right">
                <a href="{{route('genres.index')}}" class="btn btn-success">Go to See Genre Page</a>
            </div>
            <table class="table table-striped mt-3">
                <tr>
                    <th>Movie Name</th>
                    <th>Desciption</th>
                    <th>Created At</th>
                </tr>
                @foreach($movie as $mov)
                    <tr>
                        <td>{{$mov->name}}</td>
                        <td>{{Str::limit($mov->description)}}
                        <br>
                        <a href="{{route('movies.show',$mov->id)}}" class="btn btn-sm btn-success mt-2">Read more</a>
                        </td>
                        <td>{{$mov->created_at}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection