<?php
namespace App\Contracts\Dao\Movie;

use Illuminate\Http\Request;

interface MovieDaoInterface
{
    public function showAllMovie();

    public function showGenre();

    public function movieStore(Request $request);

    public function movieUpdate(Request $request);

    public function movieDelete(Request $request);
}
?>