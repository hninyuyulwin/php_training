<?php 
namespace App\Dao\Movie;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;
use App\Contracts\Dao\Movie\MovieDaoInterface;

use App\Imports\ImportMovie;
use App\Exports\ExportMovie;
use Maatwebsite\Excel\Facades\Excel;

class MovieDao implements MovieDaoInterface
{
    public function showAllMovie()
    {
        $movie = Movie::orderBy('id','desc')->get();
        return $movie;
    }

    public function search(Request $request)
    {
        if($request->isMethod('post'))
        {
            $name = $request->get('namesearch');
            $desc = $request->get('decsearch');
            $start = $request->get('startdate');
            $end = $request->get('enddate');
            if($name){
                $movie = Movie::where('name','LIKE','%'.$name.'%')->orderBy('id','desc')->get();
            }
            if($desc)
            {
                $movie = Movie::where('description','LIKE','%'.$desc.'%')->orderBy('id','desc')->get();
            }
            if($start)
            {
                $movie = Movie::where('created_at','>=',$start)->orderBy('id','desc')->get();
            }
            if($end)
            {
                $movie = Movie::where('created_at','<=',$end)->orderBy('id','desc')->get();
            }
        } 
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

    public function import($request)
    {
        return Excel::import(new ImportMovie, $request->file('file')->store('files'));
    }

    public function exportUsers(Request $request)
    {
        return Excel::download(new ExportMovie, 'movies.xlsx');
    }
}

?>