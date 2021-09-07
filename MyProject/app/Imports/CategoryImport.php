<?php

namespace App\Imports;

use App\Models\Category;
use Maatwebsite\Excel\Concerns\ToModel;

class CategoryImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Category([
            'Tên'=>$row[0],
            'theloai'=>$row[1],
            'meta_desc'=>$row[2],
            'meta_keywords'=>$row[3],

        ]);
    }
}
