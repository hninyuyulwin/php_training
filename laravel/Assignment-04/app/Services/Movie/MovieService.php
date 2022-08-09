<?php
namespace App\Services\Movie;

use App\Contracts\Dao\Movie\MovieDaoInterface;
use App\Contracts\Services\Movie\MovieServiceInterface;
use Illuminate\Http\Request;

class MovieService implements MovieServiceInterface
{
    private $movieDao;

    public function __construct(MovieDaoInterface $movieDao)
    {
        $this->movieDao = $movieDao;
    }

    public function showAllMovie()
    {
        return $this->movieDao->showAllMovie();
    }

    public function showGenre() 
    {
        return $this->movieDao->showGenre();
    }

    public function movieStore(Request $request)
    {
        return $this->movieDao->movieStore($request);
    }

    public function movieUpdate(Request $request)
    {
        return $this->movieDao->movieUpdate($request);
    }

    public function movieDelete(Request $request)
    {
        return $this->movieDao->movieDelete($request);
    }
}
?>