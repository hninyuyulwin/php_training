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

    public function search(Request $request)
    {
        return $this->movieDao->search($request);
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

    public function movieShow($id)
    {
        return $this->movieDao->movieShow($id);
    }

    public function movieEdit($id)
    {
        return $this->movieDao->movieEdit($id);
    }

    public function movieUpdate(Request $request,$id)
    {
        return $this->movieDao->movieUpdate($request,$id);
    }

    public function movieDelete($id)
    {
        return $this->movieDao->movieDelete($id);
    }

    public function import($request)
    {
        return $this->movieDao->import($request);
    }

    public function exportUsers(Request $request)
    {
        return $this->movieDao->exportUsers($request);
    }    
}
?>