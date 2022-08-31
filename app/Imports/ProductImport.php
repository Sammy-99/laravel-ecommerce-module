<?php

namespace App\Imports;

use App\Models\ModulesProductEntitiesProduct;
use Maatwebsite\Excel\Concerns\ToModel;
use Modules\Product\Entities\Product;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);
        // die(" import product ");
        return new Product([
            'title' => $row['title'],
            'slug' => $row['slug'],
            'sku' => $row['sku'],
            'price' => $row['price'],
            'product_img' => $row['product_img'],
            'category_id' => $row['category_id'],
            'sub_category_id' => $row['sub_category_id'],
            'type' => $row['type'],
            'description' => $row['description'],
            'is_active' => $row['is_active']
        ]);
    }
}
