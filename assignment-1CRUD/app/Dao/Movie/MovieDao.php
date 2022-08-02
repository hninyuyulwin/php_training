<?php 
namespace App\Dao\Movie;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;
use App\Contracts\Dao\Movie\MovieDaoInterface;

class MovieDao implements MovieDaoInterface
{
    public function showAllMovie()
    {
        $movie = Movie::orderBy('id','desc')->get();
        return $movie;
    }

    public function showGenre()
    {
        $genres = Genre::all();
        return $genres;
    }

    public function movieStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'duration' => 'required',
            'genre' => 'required',
        ]);
        $movie = Movie::create([
            'name' => $request->name,
            'description' => $request->description,
            'duration' => $request->duration,
            'genre_id' => $request->genre
        ]);
        return $movie;
    }

    public function movieShow($id)
    {
        $movie = Movie::findOrFail($id); 
        return $movie;
    }

    public function movieEdit($id)
    {
        $movie = Movie::findOrFail($id);
        return $movie;
    }

    public function movieUpdate(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'duration' => 'required',
            'genre' => 'required',
        ]);
        $movie = Movie::findOrFail($id); 
        $movie->update([
            $movie->name = $request->name,
            $movie->description = $request->description,
            $movie->duration = $request->duration,
            $movie->genre_id = $request->genre
        ]);
        return $movie;
    }

    public function movieDelete($id)
    {
        $movie = Movie::findOrFail($id)->delete();
        return $movie;
    }
}

?>