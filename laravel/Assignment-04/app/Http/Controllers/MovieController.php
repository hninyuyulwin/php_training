<?php

namespace App\Http\Controllers;

use App\Http\Resources\MovieRersource;
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
        $genre = $this->movieInterface->showGenre();
        return view('movieApi',compact('movie','genre'));
    }

    public function store(Request $request)
    {
        $movie = $this->movieInterface->movieStore($request);
        return response()->json(['success' => true]);
    }
    public function update(Request $request)
    {
        $movie = $this->movieInterface->movieUpdate($request);
        return response()->json($movie);
    }   
    public function destroy(Request $request)
    {
        $this->movieInterface->movieDelete($request);
        return response()->json(['success' => true]);
    }
}
