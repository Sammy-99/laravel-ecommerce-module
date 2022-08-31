<?php

namespace Modules\Product\Http\Controllers\frontend;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Product\Entities\Product;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function getCartProductList(Request $request)
    {
        return view('product::frontend.cart.view-cart');
    }

    public function addToCartProduct(Request $request)
    {
        if(empty($request->product_id) || $request->product_id == null){
            return response()->json(['status' => true, "data" => Session::get("shopping_cart")]);
        }
        $productData = Product::find($request->product_id);

        if ($request->session()->missing('shopping_cart')) {
            $request->session()->put('shopping_cart.'.$request->product_id.'');
        }

        $productId = $request->product_id;
       
        $productId = [
            'id' => $productData->id,
            'title' => $productData->title,
            'sku' => $productData->sku,
            'price' => $productData->price,
            'product_img' => $productData->product_img,
            'description' => $productData->description

        ];

        $request->session()->push('shopping_cart.'.$request->product_id.'', $productId);

        return response()->json(['status' => true, "data" => Session::get("shopping_cart")]);
    }

    public function removeCartItem(Request $request)
    {
        if ($request->session()->has('shopping_cart')){
            $request->session()->forget('shopping_cart.'.$request->product_id.'');

            if(count(Session::get("shopping_cart")) == 0)
                return response()->json(['status' => true, 'data' => 'No item added to your cart']);
    
            $renderview = view('product::frontend.cart.cart-render')->render();
            
           return response()->json(['status' => true, 'data' => $renderview]);

        }else{
            
            return response()->json(['status' => true, 'data' => 'No item added to your cart']);
        }

    }
}
