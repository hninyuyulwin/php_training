@extends('layouts')
@section('content')
    <div class="card col-lg-6 m-auto">
        <div class="card-header">
            <h4 class="mb-4">Import or Export Excel File</h4>
            <a href="/movies" class="btn btn-warning btn-sm">Go to check imported datas</a>
        </div>
        <div class="card-body">
            <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-4">
                    <div class="custom-file text-left">
                        <label class="custom-file-label" for="customFile">Choose file to import :</label>
                        <input type="file" name="file" class="custom-file-input form-control" id="customFile">
                    </div>
                </div>
                <button class="btn btn-primary">Import Movie</button>
                <a class="btn btn-success" href="{{ route('export-movies') }}">Export Movie</a>
            </form>
        </div>
    </div>
@endsection