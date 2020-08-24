@extends('frontend.template.layout')


@section('body-content')
<!-- site__body -->
<div class="site__body">
	
	<div class="page-header">
		<div class="page-header__container container">
			<div class="page-header__breadcrumb">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a>
							
						</li>
						<li class="breadcrumb-item">
							<a href="">{{ $category->name }}</a>
						</li>
					</ol>
				</nav>
			</div>
			<div class="page-header__title">
				@foreach( App\Models\Backend\Category::orderBy('id', 'asc')->where('id', $category->parent_id )->get() as $ParentCategory )
				@endforeach
				<h1>{{ $ParentCategory->name }}</h1>
			</div>
		</div>
	</div>


	<div class="container">
		<div class="shop-layout shop-layout--sidebar--end">
			
			<!--- left part content start -->
			<div class="shop-layout__content">
				<div class="block">
					<div class="products-view">

						<!-- left part top start -->
						<!-- <div class="products-view__options">
							<div class="view-options">
								
								<div class="view-options__control">
									<label for="">Sort By</label>
									<div>
										<select class="form-control form-control-sm" name="" id="">
											<option value="">Default</option>
											<option value="">Name (A-Z)</option>
										</select>
									</div>
								</div>
								<div class="view-options__control">
									<label for="">Show</label>
									<div>
										<select class="form-control form-control-sm" name="" id="">
											<option value="">12</option>
											<option value="">24</option>
										</select>
									</div>
								</div>
								
							</div>
						</div> -->
						<!-- left part top end -->

						<div class="products-view__list products-list" data-layout="grid-3-sidebar" data-with-features="false">
							
							<div class="products-list__body">
								
								<!-- product item start -->
								@if( $products->count() > 0 )
								@foreach( $products as $product )
								<div class="products-list__item">
									<div class="product-card">

										<div class="product-card__badges-list">
											<div class="product-card__badge product-card__badge--new">New</div>
										</div>

										<div class="product-card__image">
											<a href="{{ route('productDetails', $product->slug) }}">
												<img src="{{ asset('images/products/'. $product->images[0]->image) }}" alt="">
											</a>
										</div>

										<div class="product-card__actions">

											<div class="product-card__prices">
												{{ $product->title }}
											</div>

											<br>

											<div class="product-card__prices">
												Availability : In Stock
											</div>

											<br>
											<div class="product-card__prices">
												@if( $product->offer_price == NULL )
													{{ $product->regular_price }}
												@else 
												{{ $product->offer_price }}
												<del style="color: red;">{{ $product->regular_price }}</del>	
												@endif
											</div>

											<div class="product-card__buttons">
												@if( $product->quantity == 0 )
												<button class="btn btn-primary product-card__addtocart" type="button" disabled >Add To Cart</button>
												@else
												<input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}" >
											<button type="submit" class="btn btn-primary product-card__addtocart addCart" onclick="addToCart({{ $product->id }})"  >Add To Cart</button>
												@endif
											</div>
										</div>
									</div>
								</div>
								@endforeach
								@else
								<h1 class="alert alert-warning"> <b>Sorry!</b> No Product Found In This Category</h1>
								@endif
								<!-- product item end -->
								
							</div>
						</div>

						@if( $products->count() > 0 )
						<div class="products-view__pagination" style="margin-top: 30px;">
							{{ $products->links() }}
						</div>
						@endif

					</div>
				</div>
			</div>
			<!--- left part content end -->



			<div class="shop-layout__sidebar">
				<div class="block block-sidebar">
					<div class="block-sidebar__item">
						<div class="widget-filters widget" data-collapse data-collapse-opened-class="filter--opened">
							<h4 class="widget__title">Filters</h4>

							<div class="widget-filters__list">
								
								<!-- category wise product -->
								<div class="widget-filters__item">
									<div class="filter filter--opened" data-collapse-item>
										
										<button type="button" class="filter__title" data-collapse-trigger>
											Categories
										</button>

										<div class="filter__body" data-collapse-content>
											<div class="filter__container">
												<div class="filter-categories">
													
													<!-- category list start -->
													<ul class="filter-categories__list">

														<!-- parent category start -->
														@foreach( $pCategories as $pCategory )
														<li class="filter-categories__item filter-categories__item--current">
															<a>{{ $pCategory->name }}</a>
														</li>
														<!-- parent category end -->

														<!-- child category start -->
														@foreach( App\Models\Backend\Category::orderBy('id', 'asc')->where('parent_id', $pCategory->id )->get() as $childCategory )
														<li class="filter-categories__item filter-categories__item--child">
															<a href="{{ route('shopPage',$childCategory->slug ) }}">{{ $childCategory->name }}
															</a>
															@php
																$i = 0;
															@endphp
															@foreach( App\Models\Backend\Product::orderBy('id', 'asc')->where('category_id',$childCategory->id)->get() as $productCount )
															@php
																$i++;
															@endphp
															@endforeach
															<div class="filter-categories__counter">
																{{ $i }}
															</div>
														</li>
														@endforeach
														<!-- child category end -->
														@endforeach

													</ul>
													<!-- category list end -->

												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- category wise end -->
								
								<!-- price filter start-->
								<div class="widget-filters__item">
									<div class="filter filter--opened" data-collapse-item>
										<button type="button" class="filter__title" data-collapse-trigger>Price
											<svg class="filter__arrow" width="12px" height="7px">
												<use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
											</svg>
										</button>
										<div class="filter__body" data-collapse-content>
											<div class="filter__container">
												<div class="filter-price" data-min="500" data-max="1500" data-from="590" data-to="1130">
													<div class="filter-price__slider"></div>
													<div class="filter-price__title">Price: $<span class="filter-price__min-value"></span> – $<span class="filter-price__max-value"></span></div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- price filter end-->

							</div>

							<div class="widget-filters__actions d-flex">
								<button class="btn btn-primary btn-sm">Filter</button>
								<button class="btn btn-secondary btn-sm ml-2">Reset</button>
							</div>

						</div>
					</div>
					
					<div class="block-sidebar__item d-none d-lg-block">
						<div class="widget-products widget">
							<h4 class="widget__title">Latest Products</h4>
							
							<div class="widget-products__list">
								
								@foreach( $latestProducts as $latestProduct )
								<div class="widget-products__list">
									<div class="widget-products__item">
										<div class="widget-products__image">
											<a href="{{ route('productDetails', $latestProduct->slug ) }}">
												<img src="{{ asset('images/products/' . $latestProduct->images[0]->image) }}" alt="">
											</a>
										</div>
										<div class="widget-products__info">
											<div class="widget-products__name">
												<a href="{{ route('productDetails', $latestProduct->slug ) }}">
													{{ $latestProduct->title }}
												</a>
											</div>
											<div class="widget-products__prices">
												@if( $latestProduct->offer_price == NULL )
													{{ $latestProduct->regular_price }}
												@else
													{{ $latestProduct->offer_price }}
													<del>
														{{ $latestProduct->regular_price }}
													</del>
												@endif
											</div>
										</div>
									</div>
								</div>
								@endforeach

								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- site__body / end -->
		@endsection