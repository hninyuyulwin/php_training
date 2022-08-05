<?php

namespace App\Dao\Genre;

use App\Models\Genre;
use Illuminate\Http\Request;
use App\Contracts\Dao\Genre\GenreDaoInterface;

class GenreDao implements GenreDaoInterface
{
    public function showAll()
    {
        $genre = Genre::all();
        return $genre;
    }

    public function storeGenre(Request $request)
    {        
        $request->validate([
            'name' => 'required',
        ]);
        $genre = Genre::create([
            'name' => $request->name
        ]);
        return $genre;
    }

    public function editGenre($id)
    {        
        $genre = Genre::findOrFail($id);
        return $genre;
    }

    public function updateGenre(Request $request,$id)
    {        
        $request->validate([
            'name' => 'required'
        ]);
        $genre = Genre::findOrFail($id); 
        $genre->update([
            $genre->name = $request->name
        ]);
        return $genre;
    }

    public function deleteGenre($id)
    {        
        $genre = Genre::findOrFail($id)->delete();
        return $genre;
    }
}