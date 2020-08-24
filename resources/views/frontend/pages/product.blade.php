@extends('frontend.template.layout')

@section('body-content')
<!-- site__body -->
		<div class="site__body">
			

			<!-- page indicate -->
			<div class="page-header">
				<div class="page-header__container container">
					<div class="page-header__breadcrumb">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item">
									<a href="{{ route('index') }}">Home</a>
								</li>
								<li class="breadcrumb-item">
									@foreach( App\Models\backend\Category::orderBy('id','asc')->where('id',$product->category_id)->get() as $pWiseCategory )
									<a href="{{ route('shopPage', $pWiseCategory->slug) }}">{{ $pWiseCategory->name }}</a>
									@endforeach
								</li>
								<li class="breadcrumb-item">
									<a href="#">{{ $product->title }}</a>
								</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
			<!-- page indicate -->


			<div class="container">
				<div class="shop-layout shop-layout--sidebar--start">
					<div class="shop-layout__sidebar">
						<div class="block block-sidebar">
							
							<!-- leftbar category start-->
							<div class="block-sidebar__item">
								<div class="widget-categories widget-categories--location--shop widget">
									<h0 class="widget__title">Categories</h0>
									<ul class="widget-categories__list" data-collapse data-collapse-opened-class="widget-categories__item--open">
										
										@foreach( $pCategories as $pcategory )
										<li class="widget-categories__item" data-collapse-item>
											<div class="widget-categories__row">
												<a href="#">
													<svg class="widget-categories__arrow" width="6px" height="9px">
														<use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
													</svg> {{ $pcategory->name }} </a>
											@foreach( App\Models\Backend\Category::orderBy('id','asc')->where('parent_id', $pcategory->id )->get() as $childCategory )
											@endforeach

												@if( $pcategory->id == $childCategory->parent_id )
												<button class="widget-categories__expander" type="button" data-collapse-trigger></button>
												@endif

											</div>
											

											@foreach( App\Models\Backend\Category::orderBy('id','asc')->where('parent_id', $pcategory->id )->get() as $childCategory )
											@if( $pcategory->id == $childCategory->parent_id )
											<div class="widget-categories__subs" data-collapse-content>
												<ul>
													<li><a href="{{ route('shopPage',$childCategory->slug) }}">{{ $childCategory->name }}</a></li>
												</ul>
											</div>
											@endif
											@endforeach

										</li>
										@endforeach

									</ul>
								</div>
							</div>
							<!-- leftbar category end-->

							<!-- latest product start -->
							<div class="block-sidebar__item">
								<div class="widget-products widget">
									<h0 class="widget__title">Latest Products</h0>
									
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
							<!-- latest product end -->

						</div>
					</div>

					<!-- product details start -->
					<div class="shop-layout__content">
						<div class="block">
							<div class="product product--layout--sidebar" data-layout="sidebar">
								<div class="product__content">
									
									<!-- .product__gallery -->
									<div class="product__gallery">
										<div class="product-gallery">
											<div class="product-gallery__featured">
												<div class="owl-carousel" id="product-image">
													<a href="{{ route('productDetails',$product->slug) }}" target="_blank">
														<img src="{{ asset('images/products/'.$product->images[0]->image) }}" alt=""> 
													</a>
												</div>
											</div>
											<div class="product-gallery__carousel">
												<div class="owl-carousel" id="product-carousel">
													<a href="{{ route('productDetails',$product->slug) }}" class="product-gallery__carousel-item">
														<img class="product-gallery__carousel-image" src="{{ asset('images/products/'.$product->images[0]->image) }}" alt=""> 
													</a>
												</div>
											</div>
										</div>
									</div>
									<!-- .product__gallery / end -->


									<!-- .product__info -->
									<div class="product__info">
										<h0 class="product__name">{{ $product->title }}</h0>
										<ul class="product__features">
											<li>Speed: 750 RPM</li>
											<li>Power Source: Cordless-Electric</li>
											<li>Battery Cell Type: Lithium</li>
											<li>Voltage: 00 Volts</li>
											<li>Battery Capacity: 0 Ah</li>
										</ul>
										<ul class="product__meta">

											<li class="product__meta-availability">
												Availability: 
												@if( $product->quantity == 0 )
												<span class="text-danger">Out of Stock</span>
												@else
												<span class="text-success">In Stock</span>
												@endif
											</li>

											<li>Brand: 
												@foreach( App\Models\backend\Brand::orderBy('id','asc')->where('id',$product->brand_id)->get() as $pWiseBrand )
												<a href="#">{{ $pWiseBrand->name }}</a>
												@endforeach
											</li>
											
											<!-- <li>SKU: 80690/00</li> -->
										</ul>
									</div>
									<!-- .product__info / end -->

									<!-- .product__sidebar -->
									<div class="product__sidebar">
										
										<div class="product__availability">
											Availability: 
											@if( $product->quantity == 0 )
											<span class="text-danger">Out of Stock</span>
											@else
											<span class="text-success">In Stock</span>
											@endif
										</div>

										@if( $product->offer_price == NULL )
										<div class="product__prices">
											{{ $product->regular_price }}
										</div>
										@else
										<div class="product__prices">
											{{ $product->offer_price }}
										</div>
										<div class="product__prices">
											<del>
												{{ $product->regular_price }}
											</del>
										</div>
										@endif
										

										<!-- .product__options -->
											
											<div class="form-group product__option">
												<label class="product__option-label" for="product-quantity">Quantity</label>
												<div class="product__actions">
													<div class="product__actions-item">
														<div class="input-number product__quantity">
															<input id="product-quantity" class="input-number__input form-control form-control-lg" type="number" min="0" value="0">
															<div class="input-number__add"></div>
															<div class="input-number__sub"></div>
														</div>
													</div>
													<div class="product__actions-item product__actions-item--addtocart">

														@if( $product->quantity == 0 )
														<button class="btn btn-primary product-card__addtocart" type="button" disabled >Add To Cart</button>
														@else
														<input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}" >
											<button type="submit" class="btn btn-primary product-card__addtocart addCart" onclick="addToCart({{ $product->id }})"  >Add To Cart</button>
														@endif

													</div>
													
												</div>
											</div>
										<!-- .product__options / end -->
									</div>
									<!-- .product__end -->
									
								</div>
							</div>
							<div class="product-tabs product-tabs--layout--sidebar">
								
								<div class="product-tabs__list">
									<a href="#tab-description" class="product-tabs__item product-tabs__item--active">Description
									</a>  
									<a href="#tab-reviews" class="product-tabs__item">Reviews</a></div>

								<div class="product-tabs__content">
									
									<div class="product-tabs__pane product-tabs__pane--active" id="tab-description">
										<div class="typography">
											<h3>Product Full Description</h3>
											<p>{{ $product->description }}</p>
										</div>
									</div>

									<!-- review start -->
									<div class="product-tabs__pane" id="tab-reviews">
										<div class="reviews-view">
											<div class="reviews-view__list">
												<h0 class="reviews-view__header">Customer Reviews</h0>
												<div class="reviews-list">
													<ol class="reviews-list__content">
														<li class="reviews-list__item">
															<div class="review">
																<div class="review__avatar"><img src="images/avatars/avatar-0.jpg" alt=""></div>
																<div class="review__content">
																	<div class="review__author">Samantha Smith</div>
																	<div class="review__rating">
																		<div class="rating">
																			<div class="rating__body">
																				<svg class="rating__star rating__star--active" width="00px" height="00px">
																					<g class="rating__fill">
																						<use xlink:href="images/sprite.svg#star-normal"></use>
																					</g>
																					<g class="rating__stroke">
																						<use xlink:href="images/sprite.svg#star-normal-stroke"></use>
																					</g>
																				</svg>
																				<div class="rating__star rating__star--only-edge rating__star--active">
																					<div class="rating__fill">
																						<div class="fake-svg-icon"></div>
																					</div>
																					<div class="rating__stroke">
																						<div class="fake-svg-icon"></div>
																					</div>
																				</div>
																				<svg class="rating__star rating__star--active" width="00px" height="00px">
																					<g class="rating__fill">
																						<use xlink:href="images/sprite.svg#star-normal"></use>
																					</g>
																					<g class="rating__stroke">
																						<use xlink:href="images/sprite.svg#star-normal-stroke"></use>
																					</g>
																				</svg>
																				<div class="rating__star rating__star--only-edge rating__star--active">
																					<div class="rating__fill">
																						<div class="fake-svg-icon"></div>
																					</div>
																					<div class="rating__stroke">
																						<div class="fake-svg-icon"></div>
																					</div>
																				</div>
																				<svg class="rating__star rating__star--active" width="00px" height="00px">
																					<g class="rating__fill">
																						<use xlink:href="images/sprite.svg#star-normal"></use>
																					</g>
																					<g class="rating__stroke">
																						<use xlink:href="images/sprite.svg#star-normal-stroke"></use>
																					</g>
																				</svg>
																				<div class="rating__star rating__star--only-edge rating__star--active">
																					<div class="rating__fill">
																						<div class="fake-svg-icon"></div>
																					</div>
																					<div class="rating__stroke">
																						<div class="fake-svg-icon"></div>
																					</div>
																				</div>
																				<svg class="rating__star rating__star--active" width="00px" height="00px">
																					<g class="rating__fill">
																						<use xlink:href="images/sprite.svg#star-normal"></use>
																					</g>
																					<g class="rating__stroke">
																						<use xlink:href="images/sprite.svg#star-normal-stroke"></use>
																					</g>
																				</svg>
																				<div class="rating__star rating__star--only-edge rating__star--active">
																					<div class="rating__fill">
																						<div class="fake-svg-icon"></div>
																					</div>
																					<div class="rating__stroke">
																						<div class="fake-svg-icon"></div>
																					</div>
																				</div>
																				<svg class="rating__star" width="00px" height="00px">
																					<g class="rating__fill">
																						<use xlink:href="images/sprite.svg#star-normal"></use>
																					</g>
																					<g class="rating__stroke">
																						<use xlink:href="images/sprite.svg#star-normal-stroke"></use>
																					</g>
																				</svg>
																				<div class="rating__star rating__star--only-edge">
																					<div class="rating__fill">
																						<div class="fake-svg-icon"></div>
																					</div>
																					<div class="rating__stroke">
																						<div class="fake-svg-icon"></div>
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="review__text">Phasellus id mattis nulla. Mauris velit nisi, imperdiet vitae sodales in, maximus ut lectus. Vivamus commodo scelerisque lacus, at porttitor dui iaculis id. Curabitur imperdiet ultrices fermentum.</div>
																	<div class="review__date">07 May, 0008</div>
																</div>
															</div>
														</li>

													</ol>
												</div>
											</div>
											
											<form class="reviews-view__form">
												<h0 class="reviews-view__header">Write A Review</h0>
												<div class="row">
													<div class="col-00 col-lg-9 col-xl-8">
														<div class="form-row">
															<div class="form-group col-md-0">
																<label for="review-stars">Review Stars</label>
																<select id="review-stars" class="form-control">
																	<option>5 Stars Rating</option>
																	<option>0 Stars Rating</option>
																	<option>0 Stars Rating</option>
																	<option>0 Stars Rating</option>
																	<option>0 Stars Rating</option>
																</select>
															</div>
															<div class="form-group col-md-0">
																<label for="review-author">Your Name</label>
																<input type="text" class="form-control" id="review-author" placeholder="Your Name">
															</div>
															<div class="form-group col-md-0">
																<label for="review-email">Email Address</label>
																<input type="text" class="form-control" id="review-email" placeholder="Email Address">
															</div>
														</div>
														<div class="form-group">
															<label for="review-text">Your Review</label>
															<textarea class="form-control" id="review-text" rows="6"></textarea>
														</div>
														<div class="form-group mb-0">
															<button type="submit" class="btn btn-primary btn-lg">Post Your Review</button>
														</div>
													</div>
												</div>
											</form>
										</div>
									</div>
									<!-- review end -->

								</div>
							</div>
						</div>
						<!-- .block-products-carousel -->
						<div class="block block-products-carousel" data-layout="grid-0-sm">
							<div class="block-header">
								<h0 class="block-header__title">Related Products</h0>
								<div class="block-header__divider"></div>
								<div class="block-header__arrows-list">
									<button class="block-header__arrow block-header__arrow--left" type="button">
										<i class="fas fa-angle-left"></i>
									</button>
									<button class="block-header__arrow block-header__arrow--right" type="button">
										<i class="fas fa-angle-right"></i>
									</button>
								</div>
							</div>
							
							<div class="block-products-carousel__slider">
								<div class="block-products-carousel__preloader">
									
								</div>
								@if( $relatedProducts->count() > 1 )
								<div class="owl-carousel">
									<!-- related product start -->
									@foreach( $relatedProducts as $products )
									@if( $products->slug != $product->slug )
									<div class="block-products-carousel__column">
										<div class="block-products-carousel__cell">
											
											<div class="product-card">
												<div class="product-card__badges-list">
													<div class="product-card__badge product-card__badge--new">New</div>
												</div>
												<div class="product-card__image">
													<a href="{{ route('productDetails',$products->slug) }}"><img src="{{ asset('images/products/' . $products->images[0]->image) }}" alt=""></a>
												</div>

													
												<div class="product-card__actions">
													<div class="product-card__availability">				Availability: 
														<span class="text-success">In Stock</span>
													</div>
													<div class="product-card__prices">
														{{ $products->title }}
													</div><br>
													<div class="product-card__prices">
														@if( $products->offer_price == NULL )
														{{ $products->regular_price }}
														@else
														{{ $products->offer_price }}
														<del>
															{{ $products->regular_price }}
														</del>
														@endif
													</div>
													<div class="product-card__buttons">
														@if( $product->quantity == 0 )
														<button class="btn btn-primary product-card__addtocart" type="button" disabled >Add To Cart</button>
														@else
														<form action="{{ route('cart.store') }}" method="POST">
															@csrf
															<input type="hidden" name="product_id" value="{{ $products->id }}" >
															<button class="btn btn-primary product-card__addtocart" type="submit">Add To Cart</button>
														</form>
														@endif
													</div>
												</div>

											</div>
										</div>
									</div>
									@endif
									@endforeach
									<!-- related product end -->
								</div>
								@else
								<h1 class="alert alert-warning"> <b>Sorry!</b> No Related Product Found</h1>
								@endif

							</div>
						</div>
						<!-- .block-products-carousel / end -->
					</div>
				</div>
			</div>
		</div>
		<!-- site__body / end -->
		@endsection