<?php
namespace App\Contracts\Services\Movie;

use Illuminate\Http\Request;

interface MovieServiceInterface
{
    public function showAllMovie();

    public function showGenre();

    public function movieStore(Request $request);

    public function movieUpdate(Request $request);

    public function movieDelete(Request $request);
}
?>