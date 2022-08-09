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

    public function showGenre(){
        $genre = Genre::all();
        return $genre;
    }

    public function movieStore(Request $request)
    {
        $movie   =   Movie::updateOrCreate(
            [
                'id' => $request->id
            ],
            [
                'name' => $request->title, 
                'description' => $request->code,
                'duration' => $request->author,
                'genre_id' => $request->genre
            ]);
            return $movie;
    }

    public function movieUpdate(Request $request)
    {
        $movie  = Movie::where('id',$request->id)->first(); 
        return $movie;
    }

    public function movieDelete(Request $request)
    {
        $movie = Movie::where('id',$request->id)->delete();
        return $movie;
    }
}

?>