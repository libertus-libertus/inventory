<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Product([
            'name'        => $row['name'],
            'sku'         => $row['sku'],
            'description' => $row['description'],
            'category_id' => $row['category_id'],
            'unit'        => $row['unit'],
            'quantity'    => $row['quantity'],
            'status'      => $row['status'],
            'supplier_id' => $row['supplier_id'],
        ]);
    }
}
