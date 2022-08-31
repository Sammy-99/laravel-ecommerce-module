<?php

use Modules\Product\Entities\Product;
?>


@extends('product::layouts.master')
@include('product::layouts.sidebar')

@section('content')
    <div class="col-md-10 border">
        <div class=" m-4" id="data-table">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">SKU</th>
                    <th scope="col">Price</th>
                    <th scope="col">Category</th>
                    <th scope="col">Sub Category</th>
                    <th scope="col">Product Type</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)

                        <tr>
                            <th scope="row">{{ $product->id }}</th>
                            <td>{{ $product->title }}</td>
                            <td>{{ $product->sku }}</td>
                            <td> {{env('CURRENCY')}}{{ $product->price }}</td>
                            <td>{{ Product::find($product->category_id)->category->name }}</td>
                            <td>{{ Product::find($product->sub_category_id)->subCategory->name }}</td>
                            <td>{{ Product::find($product->type)->productType->name }}</td>
                            <td>{{ $product->is_active }}</td>
                        </tr>
                        
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
@endsection
