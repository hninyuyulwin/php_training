<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;

use App\Mail\MovieMail;
use App\Mail\UpdateMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Contracts\Services\Movie\MovieServiceInterface;

class MovieController extends Controller
{
    private $movieInterface;

    public function __construct(MovieServiceInterface $movieServiceInterface)
    {
        $this->movieInterface = $movieServiceInterface;
    }
    public function index(Request $request)
    {
        $movie = $this->movieInterface->showAllMovie();
        return view('movie.home',compact('movie'));
    }
    public function create()
    {
        $genres = $this->movieInterface->showGenre();
        return view('movie.create',compact('genres'));
    }
    public function store(Request $request)
    {
        $movie = $this->movieInterface->movieStore($request);

        Mail::to('chengyi1500@gmail.com')->send(new MovieMail($movie));

        return redirect()->route('movies.index')->with('message','Movie Review Created Success & Email Sent!');
    }
    public function show($id)
    {
        $movie = $this->movieInterface->movieShow($id);
        $genres = $this->movieInterface->showGenre();
        return view('movie.show',compact('movie','genres'));
    }
    public function edit($id)
    {
        $movie = $this->movieInterface->movieEdit($id);
        $genres = $this->movieInterface->showGenre();
        return view('movie.edit',compact('movie','genres'));
    }
    public function update(Request $request,$id)
    {
        $movie = $this->movieInterface->movieUpdate($request,$id);

        Mail::to('chengyi1500@gmail.com')->send(new UpdateMail($movie));

        return redirect()->route('movies.index')->with('message','Movie Reivew Updated Success & Mail Sent!');
    }
    public function destroy($id)
    {
        $this->movieInterface->movieDelete($id);
        return redirect()->route('movies.index')->with('message','Movie Review Deleted Success!');
    }

    //Import & Export
    public function importView(Request $request){
        return view('importFile');
    }

    public function import(Request $request){
        $this->movieInterface->import($request);
        return redirect()->back();
    }

    public function exportUsers(Request $request){
        return $this->movieInterface->exportUsers($request);
    }
}
