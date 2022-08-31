@extends('product::frontend.layout.app')

@section('content')
    <br><br>
    <div class="container">
        <div class="row">
            {{-- <div class="col-md-1"></div> --}}
            <div class="col-md-12">
                <div class="table" id="cart-content">
                    {{-- cart item content --}}
                </div>
            </div>
            {{-- <div class="col-md-1"></div> --}}

        </div>
    </div>
@endsection

@section('script')
<script>
    $(document).ready(function(){

        renderCartHtml();

        $(document).on("click", ".remove_product", function(){
            var product_id = $(this).val();

            renderCartHtml(product_id);
            
        });

        function renderCartHtml(product_id = null){
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: "POST",
                url: "{{ asset('product/cart-item-remove') }}",
                data: {product_id},
                success: function (response) {
                    // console.log(response);
                    $("#cart-content").html(response.data);
                }
            });
        }
    })
</script>
@endsection
