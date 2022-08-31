<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Product\Entities\Product;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';

    protected $fillable = [
        'name'
    ];
    
    protected static function newFactory()
    {
        return \Modules\Product\Database\factories\CategoryFactory::new();
    }

    public function product()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
}
