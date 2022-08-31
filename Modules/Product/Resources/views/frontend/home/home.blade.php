<?php

// echo "<pre>";
//     print_r($products->toArray());
//     die(" pro ");



?>


@extends('product::frontend.layout.app')
@section('content')
    {{--  --}}
    <section class="slider_section ">
        <div class="slider_bg_box">
            <img src="{{ asset('frontend/images/slider-bg.jpg') }}" alt="">
        </div>
        <div id="customCarousel1" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container ">
                        <div class="row">
                            <div class="col-md-7 col-lg-6 ">
                                <div class="detail-box">
                                    <h1>
                                        <span>
                                            Sale 20% Off
                                        </span>
                                        <br>
                                        On Everything
                                    </h1>
                                    <p>
                                        Explicabo esse amet tempora quibusdam laudantium, laborum eaque magnam fugiat hic?
                                        Esse dicta aliquid error repudiandae earum suscipit fugiat molestias, veniam, vel
                                        architecto veritatis delectus repellat modi impedit sequi.
                                    </p>
                                    <div class="btn-box">
                                        <a href="" class="btn1">
                                            Shop Now
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item ">
                    <div class="container ">
                        <div class="row">
                            <div class="col-md-7 col-lg-6 ">
                                <div class="detail-box">
                                    <h1>
                                        <span>
                                            Sale 20% Off
                                        </span>
                                        <br>
                                        On Everything
                                    </h1>
                                    <p>
                                        Explicabo esse amet tempora quibusdam laudantium, laborum eaque magnam fugiat hic?
                                        Esse dicta aliquid error repudiandae earum suscipit fugiat molestias, veniam, vel
                                        architecto veritatis delectus repellat modi impedit sequi.
                                    </p>
                                    <div class="btn-box">
                                        <a href="" class="btn1">
                                            Shop Now
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container ">
                        <div class="row">
                            <div class="col-md-7 col-lg-6 ">
                                <div class="detail-box">
                                    <h1>
                                        <span>
                                            Sale 20% Off
                                        </span>
                                        <br>
                                        On Everything
                                    </h1>
                                    <p>
                                        Explicabo esse amet tempora quibusdam laudantium, laborum eaque magnam fugiat hic?
                                        Esse dicta aliquid error repudiandae earum suscipit fugiat molestias, veniam, vel
                                        architecto veritatis delectus repellat modi impedit sequi.
                                    </p>
                                    <div class="btn-box">
                                        <a href="" class="btn1">
                                            Shop Now
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <ol class="carousel-indicators">
                    <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
                    <li data-target="#customCarousel1" data-slide-to="1"></li>
                    <li data-target="#customCarousel1" data-slide-to="2"></li>
                </ol>
            </div>
        </div>
    </section>
    <!-- end slider section -->
    </div>

    <!-- arrival section -->
    {{-- <section class="arrival_section">
        <div class="container">
            <div class="box">
                <div class="arrival_bg_box">
                    <img src="{{ asset('frontend/images/arrival-bg.png') }}" alt="">
                </div>
                <div class="row">
                    <div class="col-md-6 ml-auto">
                        <div class="heading_container remove_line_bt">
                            <h2>
                                #NewArrivals
                            </h2>
                        </div>
                        <p style="margin-top: 20px;margin-bottom: 30px;">
                            Vitae fugiat laboriosam officia perferendis provident aliquid voluptatibus dolorem, fugit ullam
                            sit earum id eaque nisi hic? Tenetur commodi, nisi rem vel, ea eaque ab ipsa, autem similique ex
                            unde!
                        </p>
                        <a href="">
                            Shop Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- end arrival section -->

    <!-- product section -->
    <section class="product_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Our <span>products</span>
                </h2>
            </div>
            <div class="row">
                @foreach ($products as $product)
                    
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="box">
                        <div class="option_container">
                            <div class="options">
                                <a href="#" class="add-to-cart" id="item-{{ $product->id }}" data-value="{{ $product->id }}">
                                    Add to Cart
                                </a>
                                <a href="#" class="buy-now" id="item-{{ $product->id }}" data-value="{{ $product->id }}">
                                    Buy Now
                                </a>
                            </div>
                        </div>
                        <div class="img-box">
                            <img src="{{ $product->product_img }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                {{ $product->title }}
                            </h5>
                            <h6>
                               {{ env('CURRENCY') }}{{ $product->price }}
                            </h6>
                        </div>
                    </div>
                </div>

                @endforeach
                {{-- <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="box">
                        <div class="option_container">
                            <div class="options">
                                <a href="" class="option1">
                                    Add To Cart
                                </a>
                                <a href="" class="option2">
                                    Buy Now
                                </a>
                            </div>
                        </div>
                        <div class="img-box">
                            <img src="images/p2.png" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                Men's Shirt
                            </h5>
                            <h6>
                                $80
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="box">
                        <div class="option_container">
                            <div class="options">
                                <a href="" class="option1">
                                    Add To Cart
                                </a>
                                <a href="" class="option2">
                                    Buy Now
                                </a>
                            </div>
                        </div>
                        <div class="img-box">
                            <img src="images/p3.png" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                Women's Dress
                            </h5>
                            <h6>
                                $68
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="box">
                        <div class="option_container">
                            <div class="options">
                                <a href="" class="option1">
                                    Add To Cart
                                </a>
                                <a href="" class="option2">
                                    Buy Now
                                </a>
                            </div>
                        </div>
                        <div class="img-box">
                            <img src="images/p4.png" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                Women's Dress
                            </h5>
                            <h6>
                                $70
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="box">
                        <div class="option_container">
                            <div class="options">
                                <a href="" class="option1">
                                    Add To Cart
                                </a>
                                <a href="" class="option2">
                                    Buy Now
                                </a>
                            </div>
                        </div>
                        <div class="img-box">
                            <img src="images/p5.png" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                Women's Dress
                            </h5>
                            <h6>
                                $75
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="box">
                        <div class="option_container">
                            <div class="options">
                                <a href="" class="option1">
                                    Add To Cart
                                </a>
                                <a href="" class="option2">
                                    Buy Now
                                </a>
                            </div>
                        </div>
                        <div class="img-box">
                            <img src="images/p6.png" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                Women's Dress
                            </h5>
                            <h6>
                                $58
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="box">
                        <div class="option_container">
                            <div class="options">
                                <a href="" class="option1">
                                    Add To Cart
                                </a>
                                <a href="" class="option2">
                                    Buy Now
                                </a>
                            </div>
                        </div>
                        <div class="img-box">
                            <img src="images/p7.png" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                Women's Dress
                            </h5>
                            <h6>
                                $80
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="box">
                        <div class="option_container">
                            <div class="options">
                                <a href="" class="option1">
                                    Add To Cart
                                </a>
                                <a href="" class="option2">
                                    Buy Now
                                </a>
                            </div>
                        </div>
                        <div class="img-box">
                            <img src="images/p8.png" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                Men's Shirt
                            </h5>
                            <h6>
                                $65
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="box">
                        <div class="option_container">
                            <div class="options">
                                <a href="" class="option1">
                                    Add To Cart
                                </a>
                                <a href="" class="option2">
                                    Buy Now
                                </a>
                            </div>
                        </div>
                        <div class="img-box">
                            <img src="images/p9.png" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                Men's Shirt
                            </h5>
                            <h6>
                                $65
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="box">
                        <div class="option_container">
                            <div class="options">
                                <a href="" class="option1">
                                    Add To Cart
                                </a>
                                <a href="" class="option2">
                                    Buy Now
                                </a>
                            </div>
                        </div>
                        <div class="img-box">
                            <img src="images/p10.png" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                Men's Shirt
                            </h5>
                            <h6>
                                $65
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="box">
                        <div class="option_container">
                            <div class="options">
                                <a href="" class="option1">
                                    Add To Cart
                                </a>
                                <a href="" class="option2">
                                    Buy Now
                                </a>
                            </div>
                        </div>
                        <div class="img-box">
                            <img src="images/p11.png" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                Men's Shirt
                            </h5>
                            <h6>
                                $65
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="box">
                        <div class="option_container">
                            <div class="options">
                                <a href="" class="option1">
                                    Add To Cart
                                </a>
                                <a href="" class="option2">
                                    Buy Now
                                </a>
                            </div>
                        </div>
                        <div class="img-box">
                            <img src="images/p12.png" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                Women's Dress
                            </h5>
                            <h6>
                                $65
                            </h6>
                        </div>
                    </div>
                </div> --}}
            </div>
            <div class="btn-box">
                <a href="#">
                    View All products
                </a>
            </div>
        </div>
    </section>
    <!-- end product section -->

    <!-- subscribe section -->
    {{-- <section class="subscribe_section">
        <div class="container-fuild">
            <div class="box">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <div class="subscribe_form ">
                            <div class="heading_container heading_center">
                                <h3>Subscribe To Get Discount Offers</h3>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>
                            <form action="">
                                <input type="email" placeholder="Enter your email">
                                <button>
                                    subscribe
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- end subscribe section -->
    <!-- client section -->
    {{-- <section class="client_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Customer's Testimonial
                </h2>
            </div>
            <div id="carouselExample3Controls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="box col-lg-10 mx-auto">
                            <div class="img_container">
                                <div class="img-box">
                                    <div class="img_box-inner">
                                        <img src="images/client.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="detail-box">
                                <h5>
                                    Anna Trevor
                                </h5>
                                <h6>
                                    Customer
                                </h6>
                                <p>
                                    Dignissimos reprehenderit repellendus nobis error quibusdam? Atque animi sint unde quis
                                    reprehenderit, et, perspiciatis, debitis totam est deserunt eius officiis ipsum ducimus
                                    ad labore modi voluptatibus accusantium sapiente nam! Quaerat.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="box col-lg-10 mx-auto">
                            <div class="img_container">
                                <div class="img-box">
                                    <div class="img_box-inner">
                                        <img src="images/client.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="detail-box">
                                <h5>
                                    Anna Trevor
                                </h5>
                                <h6>
                                    Customer
                                </h6>
                                <p>
                                    Dignissimos reprehenderit repellendus nobis error quibusdam? Atque animi sint unde quis
                                    reprehenderit, et, perspiciatis, debitis totam est deserunt eius officiis ipsum ducimus
                                    ad labore modi voluptatibus accusantium sapiente nam! Quaerat.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="box col-lg-10 mx-auto">
                            <div class="img_container">
                                <div class="img-box">
                                    <div class="img_box-inner">
                                        <img src="images/client.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="detail-box">
                                <h5>
                                    Anna Trevor
                                </h5>
                                <h6>
                                    Customer
                                </h6>
                                <p>
                                    Dignissimos reprehenderit repellendus nobis error quibusdam? Atque animi sint unde quis
                                    reprehenderit, et, perspiciatis, debitis totam est deserunt eius officiis ipsum ducimus
                                    ad labore modi voluptatibus accusantium sapiente nam! Quaerat.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel_btn_box">
                    <a class="carousel-control-prev" href="#carouselExample3Controls" role="button" data-slide="prev">
                        <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExample3Controls" role="button" data-slide="next">
                        <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </section> --}}
    {{--  --}}
@endsection

@section('script')

<script>
    $(document).ready(function () {

        getCartProductCount();

        $(".add-to-cart").click(function(e){
            e.preventDefault();

            var product_id = $(this).data('value');
        
            getCartProductCount(product_id);
            
        });

        function getCartProductCount(product_id = null){

            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: "POST",
                url: "{{ asset('product/add-to-cart') }}",
                data: {product_id},
                success: function (response) {
                  
                    var cartProductCount = 0;
                    
                    $.each(response.data, function(index, value) {
                        cartProductCount += value.length;
                    });

                    $(".cart_products").text('');
                    $(".cart_products").text(cartProductCount);
                }
            });
        }
    });
</script>




@endsection