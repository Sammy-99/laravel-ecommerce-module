<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\User;
use Modules\Product\Entities\Product;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductImport;
use Modules\Product\Entities\Category;
use Modules\Product\Transformers\ProductResource;

class ProductController extends Controller
{
    public function getProductList(Request $request)
    {
        // echo "<pre>";
        // print_r(Category::with('product')->get()->toArray());
        $allProduct = Product::all();
        return view('product::index', ['products' => $allProduct]);
    }

    public function fileImport(Request $request)
    {
        // echo "<pre>";
        // print_r($request->file('product_file'));
        // die(" in controller ");
        Excel::import(new ProductImport, $request->file('product_file')->store('temp'));
        return redirect()->back()->with('status', 'The file has been imported to the database. ');
    }
    
}
