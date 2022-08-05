<?php
namespace App\Services\Genre;

use Illuminate\Http\Request;
use App\Contracts\Dao\Genre\GenreDaoInterface;
use App\Contracts\Services\Genre\GenreServiceInterface;

class GenreService implements GenreServiceInterface
{
    private $genreDao;

    public function __construct(GenreDaoInterface $genreDao)
    {
        $this->genreDao = $genreDao;
    }

    public function showAll()
    {
        return $this->genreDao->showAll();
    }

    public function storeGenre(Request $request)
    {
        return $this->genreDao->storeGenre($request);
    }

    public function editGenre($id)
    {
        return $this->genreDao->editGenre($id);
    }

    public function updateGenre(Request $request,$id)
    {
        return $this->genreDao->updateGenre($request,$id);
    }

    public function deleteGenre($id)
    {
        return $this->genreDao->deleteGenre($id);
    }
}