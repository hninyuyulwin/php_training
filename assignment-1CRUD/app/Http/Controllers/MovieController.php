<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use App\Contracts\Services\Movie\MovieServiceInterface;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    private $movieInterface;

    public function __construct(MovieServiceInterface $movieServiceInterface)
    {
        $this->movieInterface = $movieServiceInterface;
    }
    public function index()
    {
        $movie = $this->movieInterface->showAllMovie();
        return view('movie/home',compact('movie'));
    }
    public function create()
    {
        $genres = $this->movieInterface->showGenre();
        return view('movie/create',compact('genres'));
    }
    public function store(Request $request)
    {
        $movie = $this->movieInterface->movieStore($request);
        return redirect('/movies');
    }
    public function show($id)
    {
        $movie = $this->movieInterface->movieShow($id);
        $genres = $this->movieInterface->showGenre();
        return view('movie/show',compact('movie','genres'));
    }
    public function edit($id)
    {
        $movie = $this->movieInterface->movieEdit($id);
        $genres = $this->movieInterface->showGenre();
        return view('movie/edit',compact('movie','genres'));
    }
    public function update(Request $request,$id)
    {
        $movie = $this->movieInterface->movieUpdate($request,$id);
        return redirect('/movies');
    }
    public function delete($id)
    {
        $movie = $this->movieInterface->movieDelete($id);
        return redirect('/movies');
    }
}
