<?php

namespace Modules\Product\Entities;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Product\Entities\Category;
use Modules\Product\Entities\SubCategory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'sku',
        'price',
        'product_img',
        'category_id',
        'sub_category_id',
        'type',
        'description',
        'is_active'
    ];
    
    protected static function newFactory()
    {
        return \Modules\Product\Database\factories\ProductFactory::new();
    }

    protected function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    protected function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }

    protected function productType()
    {
        return $this->belongsTo(ProductType::class, 'type');
    }

}
