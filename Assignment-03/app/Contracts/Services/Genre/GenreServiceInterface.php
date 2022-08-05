<?php
namespace App\Contracts\Services\Genre;

use Illuminate\Http\Request;


interface GenreServiceInterface
{
    public function showAll();

    public function storeGenre(Request $request);

    public function editGenre($id);

    public function updateGenre(Request $request,$id);

    public function deleteGenre($id);
}