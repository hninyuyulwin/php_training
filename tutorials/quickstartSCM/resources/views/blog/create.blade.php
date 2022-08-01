@extends('blog/layout')
@section('content')
    <a href="/blogs" class="btn btn-primary mt-3">Back</a>
    <div class="card mt-3">
        <div class="card-header"><h4>Create Your New Blog</h4></div>
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
            <form action="/blogs" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" class="form-control" name="title">
                </div><br>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="description" class="form-control" rows="5"></textarea>
                </div>
                <button type="submit" class="btn btn-success mt-3">Create</button>
            </form>
        </div>
    </div>
@endsection