@extends('layout')
@section('content')
    <a href="/blogs" class="btn btn-success mt-3">Back</a>
    <div class="card mt-3">
        <div class="card-header">Showing Content</div>
        <div class="card-body">
            <div>
                <h5 class="card-title">{{$blog->title}}</h5>
                <p class="card-text">{{$blog->description}}</p>
            </div>
        </div>
    </div>
@endsection