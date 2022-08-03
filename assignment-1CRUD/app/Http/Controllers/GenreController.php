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
    public function showAll()
    {

        $genre = $this->genreInterface->showAll();
        return view('genre.home',compact('genre'));
    }
    public function create()
    {
        return view('genre.create');
    }
    public function storeGenre(Request $request)
    {
        $this->genreInterface->storeGenre($request);
        return redirect('/genres');
    }
    public function editGenre($id)
    {
        $genre = $this->genreInterface->editGenre($id);
        return view('genre.edit',compact('genre'));
    }
    public function updateGenre(Request $request,$id)
    {
        $this->genreInterface->updateGenre($request,$id);
        return redirect('/genres');
    }
    public function deleteGenre($id)
    {
        $this->genreInterface->deleteGenre($id);
        return redirect('/genres');
    }
}
