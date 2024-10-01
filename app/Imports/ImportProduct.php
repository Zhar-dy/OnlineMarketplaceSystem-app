<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportProduct implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'category_id'  => $row['category_id'],
            'seller_id'    => $row['seller_id'],
            'name'         => $row['name'],
            'description'  => $row['description'],
            'price'        => $row['price'],
            'created_at'   => $row['created_at'],
            'updated_at'   => $row['updated_at']
        ]);
    }
}
