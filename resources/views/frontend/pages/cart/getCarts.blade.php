@foreach( App\Models\Frontend\Cart::totalCarts() as $cart )
<tr>
    <td style="width: 20%;">
        <a href="{{ route('productDetails', $cart->product->slug) }}">
        <img src="{{ asset('images/products/' . $cart->product->images[0]->image) }}" style="width: 100%;" alt="">
        </a>
    </td>
    <td style="padding: 30px;">
        <p>{{ $cart->product->title }}</p>
        @if( $cart->product->offer_price == NULL )
            {{ $cart->product->regular_price }}
        @else
            {{ $cart->product->offer_price }}
            <del style="color: red;">{{ $cart->product->regular_price }}</del>
        @endif
        <form action="{{ route('cart.destroy', $cart->id) }}" method="post">
        @csrf
            <button class="badge badge-danger" style="border: none; cursor: pointer">remove product</button>
        </form>
    </td>
</tr>
@endforeach