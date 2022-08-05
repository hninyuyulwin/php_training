<?php
namespace App\Contracts\Services\Movie;

use Illuminate\Http\Request;

interface MovieServiceInterface
{
    public function showAllMovie();
    
    public function search(Request $request);

    public function showGenre();

    public function movieStore(Request $request);

    public function movieShow($id);

    public function movieEdit($id);

    public function movieUpdate(Request $request,$id);

    public function movieDelete($id);

    public function import($request);
    
    public function exportUsers(Request $request);
}
?>