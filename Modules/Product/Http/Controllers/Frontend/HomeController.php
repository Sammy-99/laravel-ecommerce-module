<?php

namespace Modules\Product\Http\Controllers\Frontend;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Product\Entities\Product;

class HomeController extends Controller
{
    public function getProduct(Request $request)
    {
        $allProducts = Product::all();

        return view('product::frontend.home.home', ['products' => $allProducts]);
    }
}
