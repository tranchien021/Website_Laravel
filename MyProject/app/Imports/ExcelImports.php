<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ExcelImports implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
           'masp'=>$row[0],
           'img'=>$row[1],
           'name'=>$row[2],
           'address'=>$row[3],
           'date'=>$row[4],
           'theloai'=>$row[5],
           'price'=>$row[6],
           'content'=>$row[7],
           'tinhtrang'=>$row[8],
        ]);
    }
}
