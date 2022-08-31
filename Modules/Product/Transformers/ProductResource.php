<?php

namespace Modules\Product\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Product\Entities\Category;
use Modules\Product\Entities\SubCategory;
class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $request->id,
            'title' => $request->title,
            'slug' => $request->slug,
            'sku' => $request->sku,
            'price' => $request->price,
            'product_img' => $request->product_img,
            'category_id' => Category::where('id',$request->category_id),
            'sub_category_id' => $request->sub_category_id,
            'type' => $request->type,
            'description' => $request->description,
            'is_active' => $request->is_active,
        ];


        //return parent::toArray($request);
    }
}
