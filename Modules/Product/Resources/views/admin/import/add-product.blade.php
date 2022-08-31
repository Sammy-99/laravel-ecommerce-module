@extends('product::layouts.master')
@include('product::layouts.sidebar')

@section('content')
    <div class="col-md-10 border ">
        <h1 class="m-5"> Import Product Data </h1>
        <div class="row m-5">
            <div>
                <form action="{{ route('insert-product') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <input type="file" class="" id="product_file" name="product_file">
                    <br>
                    <br>
                    @if (session()->has('status'))
                        <div class="alert alert-success">
                            {{ session()->get('status') }}
                        </div>
                    @endif
                    <button type="submit" class="btn btn-primary">Import</button>

                </form>
            </div>
        </div>
    </div>
@endsection
