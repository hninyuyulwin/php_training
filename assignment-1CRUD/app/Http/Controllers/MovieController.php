<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use App\Contracts\Services\Movie\MovieServiceInterface;
use Illuminate\Http\Request;


use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportMovie;
use App\Exports\ExportMovie;

class MovieController extends Controller
{
    private $movieInterface;

    public function __construct(MovieServiceInterface $movieServiceInterface)
    {
        $this->movieInterface = $movieServiceInterface;
    }
    public function showAllMovie()
    {
        $movie = $this->movieInterface->showAllMovie();
        return view('movie.home',compact('movie'));
    }
    public function create()
    {
        $genres = $this->movieInterface->showGenre();
        return view('movie.create',compact('genres'));
    }
    public function movieStore(Request $request)
    {
        $this->movieInterface->movieStore($request);
        return redirect('/movies');
    }
    public function movieShow($id)
    {
        $movie = $this->movieInterface->movieShow($id);
        $genres = $this->movieInterface->showGenre();
        return view('movie.show',compact('movie','genres'));
    }
    public function movieEdit($id)
    {
        $movie = $this->movieInterface->movieEdit($id);
        $genres = $this->movieInterface->showGenre();
        return view('movie.edit',compact('movie','genres'));
    }
    public function movieUpdate(Request $request,$id)
    {
        $this->movieInterface->movieUpdate($request,$id);
        return redirect('/movies');
    }
    public function movieDelete($id)
    {
        $this->movieInterface->movieDelete($id);
        return redirect('/movies');
    }

    public function importView(Request $request){
        return view('importFile');
    }

    public function import(Request $request){
        Excel::import(new ImportMovie, $request->file('file')->store('files'));
        return redirect()->back();
    }

    public function exportUsers(Request $request){
        return Excel::download(new ExportMovie, 'movies.xlsx');
    }
}
