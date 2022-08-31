<table class="table  mb-0" style="border-top: 0">
    <th></th>
    <th>Product</th>
    <th>Price</th>
    <th>Qnt</th>
    <th></th>

    @foreach (Session::get('shopping_cart') as $key => $val)
        <?php $i = 1; ?>
        @foreach ($val as $k => $v)
            @if ($i == 1)
                <tr>
                    <td>
                        <img src="{{ $v['product_img'] }}" alt=" product image" width="80px">
                        <input type="hidden" value="{{ $v['id'] }}" class="added-product">
                    </td>
                    <td>
                        <div class="fw-bold">{{ $v['title'] }}</div>
                        <small>{{ $v['description'] }}</small>
                    </td>
                    <td>{{ env('CURRENCY') }}{{ $v['price'] }} .00</td>
                    <td>{{ count($val) }}</td>
                    <td>
                        <button type="button" class="btn btn-outline-danger btn-sm remove_product"
                            value="{{ $v['id'] }}">Remove
                        </button>
                    </td>
                    @php
                        $totalPrice[] = $v['price'] * count($val);
                    @endphp
                </tr>
            @endif
            <?php $i++; ?>
        @endforeach
    @endforeach
    <tr>
        <td colspan="4" style="text-align: end">
            Total - {{ env('CURRENCY') }}{{ array_sum($totalPrice) }} .00

            @php
                Session::put('totalCartPrice', array_sum($totalPrice));
            @endphp
        </td>
        <td>
            <a href="{{ route('checkout') }}">
                <button type="button" class="btn btn-outline-success btn-sm">Checkout</button>
            </a>
        </td>
    </tr>
</table>
