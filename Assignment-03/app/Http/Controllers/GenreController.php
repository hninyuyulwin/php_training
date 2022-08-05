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
        return view('genre.home',compact('genre'));
    }
    public function create()
    {
        return view('genre.create');
    }
    public function store(Request $request)
    {
        $this->genreInterface->storeGenre($request);
        return redirect()->route('genres.index')->with('message','Genre Created Success!');
    }
    public function edit($id)
    {
        $genre = $this->genreInterface->editGenre($id);
        return view('genre.edit',compact('genre'));
    }
    public function update(Request $request,$id)
    {
        $this->genreInterface->updateGenre($request,$id);
        return redirect()->route('genres.index')->with('message','Genre Updated Success!');
    }
    public function delete($id)
    {
        $this->genreInterface->deleteGenre($id);
        return redirect()->route('genres.index')->with('message','Genre Deleted Success!');
    }
}
