@extends('frontend.template.layout')
@section('body-content')

<!-- site__body -->
<div class="site__body">
	
	<div class="page-header">
		<div class="page-header__container container">
			<div class="page-header__breadcrumb">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="{{ route('index') }}">Home</a>
						</li>

						<li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
					</ol>
				</nav>
			</div>
			<div class="page-header__title">
				<h1>Shopping Cart</h1></div>
		</div>
	</div>
	
	<div class="cart block">
		<div class="container">
			
			<table class="cart__table cart-table">
				@if( App\Models\Frontend\Cart::totalCarts()->count() > 0 )
				<thead class="cart-table__head">
					<tr class="cart-table__row">
						<th class="cart-table__column cart-table__column--image">Image</th>
						<th class="cart-table__column cart-table__column--product">Product</th>
						<th class="cart-table__column cart-table__column--price">Price</th>
						<th class="cart-table__column cart-table__column--quantity">Quantity</th>
						<th class="cart-table__column cart-table__column--total">Total</th>
						<th class="cart-table__column cart-table__column--remove"></th>
					</tr>
				</thead>
				<tbody class="cart-table__body">
					
					<!-- cart item start -->
					@php
						$total_price = 0;
					@endphp

					@foreach( App\Models\Frontend\Cart::totalCarts() as $cart )
					<tr class="cart-table__row">
						<td class="cart-table__column cart-table__column--image">
							<a href="#"><img src="{{ asset('images/products/' . $cart->product->images[0]->image) }}" alt=""></a>
						</td>
						<td class="cart-table__column cart-table__column--product">
							<a href="#" class="cart-table__product-name">{{ $cart->product->title }}</a>
						</td>
						<td class="cart-table__column cart-table__column--price" data-title="Price">
							@if( $cart->product->offer_price ==  NULL )
								{{ $cart->product->regular_price }} Taka
							@else
							{{ $cart->product->offer_price }} Taka
							@endif
							
						</td>
						<td class="cart-table__column cart-table__column--quantity" data-title="Quantity">
							<div class="input-number">
								<input class="form-control input-number__input" type="number" min="1" value="{{ $cart->product_quantity }}">
								<div class="input-number__add"></div>
								<div class="input-number__sub"></div>
							</div>
						</td>
						<td class="cart-table__column cart-table__column--total" data-title="Total">
						@if( $cart->product->offer_price == NULL )
							{{  $cart->product->regular_price * $cart->product_quantity }} Taka
						@else
							{{  $cart->product->offer_price * $cart->product_quantity }} Taka
						@endif
							
						</td>
						<td class="cart-table__column cart-table__column--remove">
							<button type="button" class="btn btn-light btn-sm btn-svg-icon">
								<svg width="12px" height="12px">
									<use xlink:href="images/sprite.svg#cross-12"></use>
								</svg>
							</button>
						</td>
					</tr>
					@endforeach
					@else
					<p class="alert alert-warning">No product added in the cart</p>
					@endif
					<!-- cart item end -->
										
				</tbody>
			</table>

			<div class="cart__actions ">
				
				<!-- <form class="cart__coupon-form">
					<input type="text" class="form-control" id="input-coupon-code" placeholder="Coupon Code">
					<button type="submit" class="btn btn-primary">Apply Coupon</button>
				</form> -->

				<div class="cart__buttons ">
					<a href="{{ route('index') }}" class="btn btn-light">
						Continue Shopping
					</a> 
				</div>
			</div>

			<div class="row justify-content-end pt-5">
				<div class="col-12 col-md-7 col-lg-6 col-xl-5">
					<div class="card">
						<div class="card-body">
							<h3 class="card-title">Cart Totals</h3>
							<table class="cart__totals">
								<thead class="cart__totals-header">
									<tr>
										<th>Subtotal</th>
										<td>$5,877.00</td>
									</tr>
								</thead>
								<tfoot class="cart__totals-footer">
									<tr>
										<th>Total</th>
										<td>$5,902.00</td>
									</tr>
								</tfoot>
							</table><a class="btn btn-primary btn-xl btn-block cart__checkout-button" href="checkout.html">Proceed to checkout</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- site__body / end -->
@endsection