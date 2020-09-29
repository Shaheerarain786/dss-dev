<?php

namespace App\Imports;

use App\City;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Str;

class CitiesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new City([
            'name' => $row[0],
            'slug' => Str::slug($row[0], '-')
        ]);
    }
}
