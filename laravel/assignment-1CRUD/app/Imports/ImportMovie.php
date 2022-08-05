<?php

namespace App\Imports;

use App\Models\Movie;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportMovie implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Movie([
            'id' => $row[0],
            'name' => $row[1],
            'description' => $row[2],
            'duration' => $row[3],
            'genre_id' => $row[4],
        ]);
    }
}
