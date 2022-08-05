@extends('layout')
@section('content')
    <a href="/blogs" class="btn btn-primary mt-3">Back</a>
    <div class="card mt-3">
        <div class="card-header"><h4>Edit Your Blog</h4></div>
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
            <form action="/blogs/{{$blog->id}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Title</label>
                    <input value="{{$blog->title}}" type="text" class="form-control" name="title">
                </div><br>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="description" class="form-control" rows="5">{{$blog->description}}</textarea>
                </div>
                <button type="submit" class="btn btn-success mt-3">Update</button>
            </form>
        </div>
    </div>
@endsection