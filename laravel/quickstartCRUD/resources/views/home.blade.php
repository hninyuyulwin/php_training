@extends('layout')
@section('content')
    <a href="blogs/create" class="btn btn-success mt-3">New Blog</a>
    <div class="card mt-3">
        <div class="card-header">Blog Contents</div>
        <div class="card-body">
            @foreach($data as $val)
            <div>
                <h5 class="card-title">{{$val->title}}</h5>
                <p class="card-text">{{ Str::limit($val->description, 120) }}</p>
                <a href="/blogs/{{$val->id}}" class="btn btn-primary btn-sm">Read more</a>
                <a href="/blogs/{{$val->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                <form action="/blogs/{{$val->id}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm mt-2">Delete</button>
                </form>
            </div><hr>
            @endforeach
        </div>
    </div>
@endsection