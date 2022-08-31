<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubCategory extends Model
{
    use HasFactory;

    protected $table = 'sub_category';

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\Product\Database\factories\SubCategoryFactory::new();
    }
}
