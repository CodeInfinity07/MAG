<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Maatwebsite\Excel\Concerns\ToModel;

class Languages implements ToModel
{
    use HasFactory;

    public function model(array $row)
    {
        $languages =  new Languages();
        $genre =  new genre([
            'primary' => $row[0],
            'secondary' => $row[1],
        ]);
    }
}
