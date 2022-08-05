<?php
namespace App\Contracts\Dao\Genre;

use Illuminate\Http\Request;


interface GenreDaoInterface
{
    public function showAll();

    public function storeGenre(Request $request);

    public function editGenre($id);

    public function updateGenre(Request $request,$id);

    public function deleteGenre($id);
}