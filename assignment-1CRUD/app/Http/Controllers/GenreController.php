<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use App\Contracts\Services\Genre\GenreServiceInterface;

class GenreController extends Controller
{
    private $genreInterface;
    public function __construct(GenreServiceInterface $genreServiceInterface)
    {
        $this->genreInterface = $genreServiceInterface;
    }
    public function index()
    {

        $genre = $this->genreInterface->showAll();
        return view('genre/home',compact('genre'));
    }
    public function create()
    {
        return view('genre/create');
    }
    public function store(Request $request)
    {
        $genre = $this->genreInterface->storeGenre($request);
        return redirect('/genres');
    }
    public function edit($id)
    {
        $genre = $this->genreInterface->editGenre($id);
        return view('genre/edit',compact('genre'));
    }
    public function update(Request $request,$id)
    {
        $genre = $this->genreInterface->updateGenre($request,$id);
        return redirect('/genres');
    }
    public function delete($id)
    {
        $genre = $this->genreInterface->deleteGenre($id);
        return redirect('/genres');
    }
}
