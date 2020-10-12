@extends('frontend.template.layout')

@section('body-content')
<!-- site__body -->
		<div class="site__body">
			











			<!-- .block-slideshow -->
			<div class="block-slideshow block-slideshow--layout--with-departments block">
				<div class="container">
					

					<div class="row">
						<div class="col-12 col-lg-9 offset-lg-3">
							<div class="block-slideshow__body">
								<div class="owl-carousel">
									
									<!-- banner one start -->
									@foreach( $banners as $banner )
									<a class="block-slideshow__slide" href="{{ $banner->link }}">
										
										<div class="block-slideshow__slide-image block-slideshow__slide-image--desktop" style="background-image: url('{{ asset('images/banner/' . $banner->image )  }}')">
										</div>

										<div class="block-slideshow__slide-image block-slideshow__slide-image--mobile" style="background-image: url('{{ asset('images/banner/' . $banner->image )  }}')">
										</div>

										<div class="block-slideshow__slide-content">
											<div class="block-slideshow__slide-title">
												{{ $banner->title }}
											</div>
											<div class="block-slideshow__slide-text">
												{{ $banner->description }}
											</div>
											<div class="block-slideshow__slide-button">
												<span class="btn btn-primary btn-lg">Shop Now</span>
											</div>
										</div>
									</a>
									@endforeach
									<!-- banner one end -->
									

								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
			<!-- .block-slideshow / end -->
























			<!-- .feature-products-carousel start-->
			<div class="block block-products-carousel" data-layout="grid-4">
				<div class="container">
					
					<!-- title part start -->
					<div class="block-header">
						<h3 class="block-header__title">Featured Products</h3>
						<div class="block-header__divider"></div>
						<!--<ul class="block-header__groups-list">
							<li>
								<button type="button" class="block-header__group block-header__group--active">All</button>
							</li>
							<li>
								<button type="button" class="block-header__group">Power Tools</button>
							</li>
							<li>
								<button type="button" class="block-header__group">Hand Tools</button>
							</li>
							<li>
								<button type="button" class="block-header__group">Plumbing</button>
							</li>
						</ul>-->
						<div class="block-header__arrows-list">
							<button class="block-header__arrow block-header__arrow--left" type="button">
								<i class="fas fa-angle-left"></i>
							</button>
							<button class="block-header__arrow block-header__arrow--right" type="button">
								<i class="fas fa-angle-right"></i>
							</button>
						</div>
					</div>
					<!-- title part end -->

					<div class="block-products-carousel__slider">
						<div class="block-products-carousel__preloader"></div>
							<div class="owl-carousel">
								
								@foreach( $feature_products as $product )

								<!-- product item start -->
								<div class="product-card">
									<div class="product-card__badges-list">

										@if( $product->quantity == 0 )
										<div class="product-card__badge product-card__badge--new">
											Out of Stock
										</div>
										@else
										<div class="product-card__badge product-card__badge--new">
											In Stock
										</div>
										@endif
									</div>
									<div class="product-card__image">
										<a href="{{ route('productDetails',$product->slug) }}">
											<img src="{{ asset('images/products/'. $product->images[0]->image ) }}" alt="">
										</a>
									</div>
									
									<div class="product-card__actions">

										<div class="">{{ $product->title }}</div>

										@if( $product->offer_price == NULL )
										<div class="product-card__prices">{{ $product->regular_price }}</div>
										@else
										<div class="product-card__prices">
											<del>
												{{ $product->regular_price }}
											</del>
										</div>
										<div class="product-card__prices">{{ $product->offer_price }}</div>
										@endif
										<div class="product-card__buttons">
											
											@if( $product->quantity == 0 )
											<button class="btn btn-primary product-card__addtocart addCart"
											data-id="{{ $product->id }}" data-name="{{ $product->title }}" data-image="{{ $product->images[0]->image }}"  
											type="button" disabled >Add To Cart</button>
											@else
											
											<input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}" >
											<button type="submit" class="btn btn-primary product-card__addtocart addCart"
											data-id="{{ $product->id }}" data-name="{{ $product->title }}" data-image="{{ $product->images[0]->image }}"  
											>
											Add To Cart
											</button>

											@endif
										</div>
									</div>
								</div>
								<!-- product item end -->
								@endforeach
								

							</div>	
						</div>
					</div>
				</div>
			</div>
			<!-- .block-products-carousel / end -->






















			<!-- .block-add start -->
			<div class="block block-banner">
				<div class="container">
					<a href="#" class="block-banner__body">
						<div class="block-banner__image block-banner__image--desktop" style="background-image: url('{{ asset('frontend/images/banners/banner-1.jpg')  }}')"></div>
						<div class="block-banner__image block-banner__image--mobile" style="background-image: url('{{ asset('frontend/images/banners/banner-1-mobile.jpg')  }}')"></div>
						<div class="block-banner__title">Hundreds
							<br class="block-banner__mobile-br">Hand Tools</div>
						<div class="block-banner__text">Hammers, Chisels, Universal Pliers, Nippers, Jigsaws, Saws</div>
						<div class="block-banner__button"><span class="btn btn-sm btn-primary">Shop Now</span></div>
					</a>
				</div>
			</div>
			<!-- .block-add / end -->

























			

























			<!-- new arrivals start -->
			<div class="block block-products-carousel" data-layout="horizontal">
				<div class="container">
					<div class="block-header">
						<h3 class="block-header__title">New Arrivals</h3>
						<div class="block-header__divider"></div>
						<!--<ul class="block-header__groups-list">
							<li>
								<button type="button" class="block-header__group block-header__group--active">All</button>
							</li>
							<li>
								<button type="button" class="block-header__group">Power Tools</button>
							</li>
							<li>
								<button type="button" class="block-header__group">Hand Tools</button>
							</li>
							<li>
								<button type="button" class="block-header__group">Plumbing</button>
							</li>
						</ul>-->
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
						<div class="block-products-carousel__preloader"></div>
							<div class="owl-carousel">
							
								<div class="block-products-carousel__column">
								
									<div class="block-products-carousel__cell">
										<div class="product-card">
											<button class="product-card__quickview" type="button">
												<svg width="16px" height="16px">
													<use xlink:href="images/sprite.svg#quickview-16"></use>
												</svg> <span class="fake-svg-icon"></span></button>
											<div class="product-card__image">
												<a href="product.html"><img src="{{ asset('frontend/images/products/product-3.jpg') }}" alt=""></a>
											</div>
											<div class="product-card__info">
												<div class="product-card__name"><a href="product.html">Drill Screwdriver Brandix ALX7054 200 Watts</a></div>
												<div class="product-card__rating">
													<div class="rating">
														<div class="rating__body">
															<svg class="rating__star rating__star--active" width="13px" height="12px">
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
															<svg class="rating__star rating__star--active" width="13px" height="12px">
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
															<svg class="rating__star rating__star--active" width="13px" height="12px">
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
															<svg class="rating__star rating__star--active" width="13px" height="12px">
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
															<svg class="rating__star" width="13px" height="12px">
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
													<div class="product-card__rating-legend">9 Reviews</div>
												</div>
												<ul class="product-card__features-list">
													<li>Speed: 750 RPM</li>
													<li>Power Source: Cordless-Electric</li>
													<li>Battery Cell Type: Lithium</li>
													<li>Voltage: 20 Volts</li>
													<li>Battery Capacity: 2 Ah</li>
												</ul>
											</div>
											<div class="product-card__actions">
												<div class="product-card__availability">Availability: <span class="text-success">In Stock</span></div>
												<div class="product-card__prices">$850.00</div>
												<div class="product-card__buttons">
													<button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
													<button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
													<button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
														<svg width="16px" height="16px">
															<use xlink:href="images/sprite.svg#wishlist-16"></use>
														</svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
													<button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
														<svg width="16px" height="16px">
															<use xlink:href="images/sprite.svg#compare-16"></use>
														</svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
												</div>
											</div>
										</div>
									</div>

									<div class="block-products-carousel__cell">
										<div class="product-card">
											<button class="product-card__quickview" type="button">
												<svg width="16px" height="16px">
													<use xlink:href="images/sprite.svg#quickview-16"></use>
												</svg> <span class="fake-svg-icon"></span></button>
											<div class="product-card__badges-list">
												<div class="product-card__badge product-card__badge--sale">Sale</div>
											</div>
											<div class="product-card__image">
												<a href="product.html"><img src="{{ asset('frontend/images/products/product-4.jpg') }}" alt=""></a>
											</div>
											<div class="product-card__info">
												<div class="product-card__name"><a href="product.html">Drill Series 3 Brandix KSR4590PQS 1500 Watts</a></div>
												<div class="product-card__rating">
													<div class="rating">
														<div class="rating__body">
															<svg class="rating__star rating__star--active" width="13px" height="12px">
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
															<svg class="rating__star rating__star--active" width="13px" height="12px">
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
															<svg class="rating__star rating__star--active" width="13px" height="12px">
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
															<svg class="rating__star" width="13px" height="12px">
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
															<svg class="rating__star" width="13px" height="12px">
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
													<div class="product-card__rating-legend">7 Reviews</div>
												</div>
												<ul class="product-card__features-list">
													<li>Speed: 750 RPM</li>
													<li>Power Source: Cordless-Electric</li>
													<li>Battery Cell Type: Lithium</li>
													<li>Voltage: 20 Volts</li>
													<li>Battery Capacity: 2 Ah</li>
												</ul>
											</div>
											<div class="product-card__actions">
												<div class="product-card__availability">Availability: <span class="text-success">In Stock</span></div>
												<div class="product-card__prices"><span class="product-card__new-price">$949.00</span> <span class="product-card__old-price">$1189.00</span></div>
												<div class="product-card__buttons">
													<button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
													<button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
													<button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
														<svg width="16px" height="16px">
															<use xlink:href="images/sprite.svg#wishlist-16"></use>
														</svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
													<button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
														<svg width="16px" height="16px">
															<use xlink:href="images/sprite.svg#compare-16"></use>
														</svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
												</div>
											</div>
										</div>
									</div>

								</div>
							
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--  new arrivals end -->













































			<!-- .block-brands -->
			<div class="block block-brands">
				<div class="container">
					<div class="block-brands__slider">
						<div class="owl-carousel">
							<div class="block-brands__item">
								<a href="#"><img src="images/logos/logo-1.png" alt=""></a>
							</div>
							<div class="block-brands__item">
								<a href="#"><img src="images/logos/logo-2.png" alt=""></a>
							</div>
							<div class="block-brands__item">
								<a href="#"><img src="images/logos/logo-3.png" alt=""></a>
							</div>
							<div class="block-brands__item">
								<a href="#"><img src="images/logos/logo-4.png" alt=""></a>
							</div>
							<div class="block-brands__item">
								<a href="#"><img src="images/logos/logo-5.png" alt=""></a>
							</div>
							<div class="block-brands__item">
								<a href="#"><img src="images/logos/logo-6.png" alt=""></a>
							</div>
							<div class="block-brands__item">
								<a href="#"><img src="images/logos/logo-7.png" alt=""></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- .block-brands / end -->

























			<!-- .block-product-columns -->
			<div class="block block-product-columns d-lg-block d-none">
				<div class="container">
					<div class="row">
						<div class="col-4">
							<div class="block-header">
								<h3 class="block-header__title">Top Rated Products</h3>
								<div class="block-header__divider"></div>
							</div>
							<div class="block-product-columns__column">
								<div class="block-product-columns__item">
									<div class="product-card product-card--layout--horizontal">
										<button class="product-card__quickview" type="button">
											<svg width="16px" height="16px">
												<use xlink:href="images/sprite.svg#quickview-16"></use>
											</svg> <span class="fake-svg-icon"></span></button>
										<div class="product-card__badges-list">
											<div class="product-card__badge product-card__badge--new">New</div>
										</div>
										<div class="product-card__image">
											<a href="product.html"><img src="{{ asset('frontend/images/products/product-1.jpg')}}" alt=""></a>
										</div>
										<div class="product-card__info">
											<div class="product-card__name"><a href="product.html">Electric Planer Brandix KL370090G 300 Watts</a></div>
											<div class="product-card__rating">
												<div class="rating">
													<div class="rating__body">
														<svg class="rating__star rating__star--active" width="13px" height="12px">
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
														<svg class="rating__star rating__star--active" width="13px" height="12px">
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
														<svg class="rating__star rating__star--active" width="13px" height="12px">
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
														<svg class="rating__star rating__star--active" width="13px" height="12px">
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
														<svg class="rating__star" width="13px" height="12px">
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
												<div class="product-card__rating-legend">9 Reviews</div>
											</div>
											<ul class="product-card__features-list">
												<li>Speed: 750 RPM</li>
												<li>Power Source: Cordless-Electric</li>
												<li>Battery Cell Type: Lithium</li>
												<li>Voltage: 20 Volts</li>
												<li>Battery Capacity: 2 Ah</li>
											</ul>
										</div>
										<div class="product-card__actions">
											<div class="product-card__availability">Availability: <span class="text-success">In Stock</span></div>
											<div class="product-card__prices">$749.00</div>
											<div class="product-card__buttons">
												<button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
												<button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
												<button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
													<svg width="16px" height="16px">
														<use xlink:href="images/sprite.svg#wishlist-16"></use>
													</svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
												<button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
													<svg width="16px" height="16px">
														<use xlink:href="images/sprite.svg#compare-16"></use>
													</svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
											</div>
										</div>
									</div>
								</div>
								<div class="block-product-columns__item">
									<div class="product-card product-card--layout--horizontal">
										<button class="product-card__quickview" type="button">
											<svg width="16px" height="16px">
												<use xlink:href="images/sprite.svg#quickview-16"></use>
											</svg> <span class="fake-svg-icon"></span></button>
										<div class="product-card__badges-list">
											<div class="product-card__badge product-card__badge--hot">Hot</div>
										</div>
										<div class="product-card__image">
											<a href="product.html"><img src="{{ asset('frontend/images/products/product-2.jpg') }}" alt=""></a>
										</div>
										<div class="product-card__info">
											<div class="product-card__name"><a href="product.html">Undefined Tool IRadix DPS3000SY 2700 Watts</a></div>
											<div class="product-card__rating">
												<div class="rating">
													<div class="rating__body">
														<svg class="rating__star rating__star--active" width="13px" height="12px">
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
														<svg class="rating__star rating__star--active" width="13px" height="12px">
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
														<svg class="rating__star rating__star--active" width="13px" height="12px">
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
														<svg class="rating__star rating__star--active" width="13px" height="12px">
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
														<svg class="rating__star rating__star--active" width="13px" height="12px">
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
													</div>
												</div>
												<div class="product-card__rating-legend">11 Reviews</div>
											</div>
											<ul class="product-card__features-list">
												<li>Speed: 750 RPM</li>
												<li>Power Source: Cordless-Electric</li>
												<li>Battery Cell Type: Lithium</li>
												<li>Voltage: 20 Volts</li>
												<li>Battery Capacity: 2 Ah</li>
											</ul>
										</div>
										<div class="product-card__actions">
											<div class="product-card__availability">Availability: <span class="text-success">In Stock</span></div>
											<div class="product-card__prices">$1,019.00</div>
											<div class="product-card__buttons">
												<button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
												<button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
												<button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
													<svg width="16px" height="16px">
														<use xlink:href="images/sprite.svg#wishlist-16"></use>
													</svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
												<button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
													<svg width="16px" height="16px">
														<use xlink:href="images/sprite.svg#compare-16"></use>
													</svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
											</div>
										</div>
									</div>
								</div>
								<div class="block-product-columns__item">
									<div class="product-card product-card--layout--horizontal">
										<button class="product-card__quickview" type="button">
											<svg width="16px" height="16px">
												<use xlink:href="images/sprite.svg#quickview-16"></use>
											</svg> <span class="fake-svg-icon"></span></button>
										<div class="product-card__image">
											<a href="product.html"><img src="{{ asset('frontend/images/products/product-3.jpg')}}" alt=""></a>
										</div>
										<div class="product-card__info">
											<div class="product-card__name"><a href="product.html">Drill Screwdriver Brandix ALX7054 200 Watts</a></div>
											<div class="product-card__rating">
												<div class="rating">
													<div class="rating__body">
														<svg class="rating__star rating__star--active" width="13px" height="12px">
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
														<svg class="rating__star rating__star--active" width="13px" height="12px">
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
														<svg class="rating__star rating__star--active" width="13px" height="12px">
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
														<svg class="rating__star rating__star--active" width="13px" height="12px">
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
														<svg class="rating__star" width="13px" height="12px">
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
												<div class="product-card__rating-legend">9 Reviews</div>
											</div>
											<ul class="product-card__features-list">
												<li>Speed: 750 RPM</li>
												<li>Power Source: Cordless-Electric</li>
												<li>Battery Cell Type: Lithium</li>
												<li>Voltage: 20 Volts</li>
												<li>Battery Capacity: 2 Ah</li>
											</ul>
										</div>
										<div class="product-card__actions">
											<div class="product-card__availability">Availability: <span class="text-success">In Stock</span></div>
											<div class="product-card__prices">$850.00</div>
											<div class="product-card__buttons">
												<button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
												<button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
												<button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
													<svg width="16px" height="16px">
														<use xlink:href="images/sprite.svg#wishlist-16"></use>
													</svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
												<button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
													<svg width="16px" height="16px">
														<use xlink:href="images/sprite.svg#compare-16"></use>
													</svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-4">
							<div class="block-header">
								<h3 class="block-header__title">Special Offers</h3>
								<div class="block-header__divider"></div>
							</div>
							<div class="block-product-columns__column">
								<div class="block-product-columns__item">
									<div class="product-card product-card--layout--horizontal">
										<button class="product-card__quickview" type="button">
											<svg width="16px" height="16px">
												<use xlink:href="images/sprite.svg#quickview-16"></use>
											</svg> <span class="fake-svg-icon"></span></button>
										<div class="product-card__badges-list">
											<div class="product-card__badge product-card__badge--sale">Sale</div>
										</div>
										<div class="product-card__image">
											<a href="product.html"><img src="{{ asset('frontend/images/products/product-4.jpg')}}" alt=""></a>
										</div>
										<div class="product-card__info">
											<div class="product-card__name"><a href="product.html">Drill Series 3 Brandix KSR4590PQS 1500 Watts</a></div>
											<div class="product-card__rating">
												<div class="rating">
													<div class="rating__body">
														<svg class="rating__star rating__star--active" width="13px" height="12px">
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
														<svg class="rating__star rating__star--active" width="13px" height="12px">
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
														<svg class="rating__star rating__star--active" width="13px" height="12px">
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
														<svg class="rating__star" width="13px" height="12px">
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
														<svg class="rating__star" width="13px" height="12px">
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
												<div class="product-card__rating-legend">7 Reviews</div>
											</div>
											<ul class="product-card__features-list">
												<li>Speed: 750 RPM</li>
												<li>Power Source: Cordless-Electric</li>
												<li>Battery Cell Type: Lithium</li>
												<li>Voltage: 20 Volts</li>
												<li>Battery Capacity: 2 Ah</li>
											</ul>
										</div>
										<div class="product-card__actions">
											<div class="product-card__availability">Availability: <span class="text-success">In Stock</span></div>
											<div class="product-card__prices"><span class="product-card__new-price">$949.00</span> <span class="product-card__old-price">$1189.00</span></div>
											<div class="product-card__buttons">
												<button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
												<button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
												<button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
													<svg width="16px" height="16px">
														<use xlink:href="images/sprite.svg#wishlist-16"></use>
													</svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
												<button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
													<svg width="16px" height="16px">
														<use xlink:href="images/sprite.svg#compare-16"></use>
													</svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
											</div>
										</div>
									</div>
								</div>
								<div class="block-product-columns__item">
									<div class="product-card product-card--layout--horizontal">
										<button class="product-card__quickview" type="button">
											<svg width="16px" height="16px">
												<use xlink:href="images/sprite.svg#quickview-16"></use>
											</svg> <span class="fake-svg-icon"></span></button>
										<div class="product-card__image">
											<a href="product.html"><img src="{{ asset('frontend/images/products/product-5.jpg')}}" alt=""></a>
										</div>
										<div class="product-card__info">
											<div class="product-card__name"><a href="product.html">Brandix Router Power Tool 2017ERXPK</a></div>
											<div class="product-card__rating">
												<div class="rating">
													<div class="rating__body">
														<svg class="rating__star rating__star--active" width="13px" height="12px">
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
														<svg class="rating__star rating__star--active" width="13px" height="12px">
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
														<svg class="rating__star rating__star--active" width="13px" height="12px">
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
														<svg class="rating__star rating__star--active" width="13px" height="12px">
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
														<svg class="rating__star" width="13px" height="12px">
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
												<div class="product-card__rating-legend">9 Reviews</div>
											</div>
											<ul class="product-card__features-list">
												<li>Speed: 750 RPM</li>
												<li>Power Source: Cordless-Electric</li>
												<li>Battery Cell Type: Lithium</li>
												<li>Voltage: 20 Volts</li>
												<li>Battery Capacity: 2 Ah</li>
											</ul>
										</div>
										<div class="product-card__actions">
											<div class="product-card__availability">Availability: <span class="text-success">In Stock</span></div>
											<div class="product-card__prices">$1,700.00</div>
											<div class="product-card__buttons">
												<button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
												<button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
												<button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
													<svg width="16px" height="16px">
														<use xlink:href="images/sprite.svg#wishlist-16"></use>
													</svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
												<button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
													<svg width="16px" height="16px">
														<use xlink:href="images/sprite.svg#compare-16"></use>
													</svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
											</div>
										</div>
									</div>
								</div>
								<div class="block-product-columns__item">
									<div class="product-card product-card--layout--horizontal">
										<button class="product-card__quickview" type="button">
											<svg width="16px" height="16px">
												<use xlink:href="images/sprite.svg#quickview-16"></use>
											</svg> <span class="fake-svg-icon"></span></button>
										<div class="product-card__image">
											<a href="product.html"><img src="{{ asset('frontend/images/products/product-6.jpg')}}" alt=""></a>
										</div>
										<div class="product-card__info">
											<div class="product-card__name"><a href="product.html">Brandix Drilling Machine DM2019KW4 4kW</a></div>
											<div class="product-card__rating">
												<div class="rating">
													<div class="rating__body">
														<svg class="rating__star rating__star--active" width="13px" height="12px">
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
														<svg class="rating__star rating__star--active" width="13px" height="12px">
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
														<svg class="rating__star rating__star--active" width="13px" height="12px">
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
														<svg class="rating__star" width="13px" height="12px">
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
														<svg class="rating__star" width="13px" height="12px">
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
												<div class="product-card__rating-legend">7 Reviews</div>
											</div>
											<ul class="product-card__features-list">
												<li>Speed: 750 RPM</li>
												<li>Power Source: Cordless-Electric</li>
												<li>Battery Cell Type: Lithium</li>
												<li>Voltage: 20 Volts</li>
												<li>Battery Capacity: 2 Ah</li>
											</ul>
										</div>
										<div class="product-card__actions">
											<div class="product-card__availability">Availability: <span class="text-success">In Stock</span></div>
											<div class="product-card__prices">$3,199.00</div>
											<div class="product-card__buttons">
												<button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
												<button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
												<button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
													<svg width="16px" height="16px">
														<use xlink:href="images/sprite.svg#wishlist-16"></use>
													</svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
												<button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
													<svg width="16px" height="16px">
														<use xlink:href="images/sprite.svg#compare-16"></use>
													</svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-4">
							<div class="block-header">
								<h3 class="block-header__title">Bestsellers</h3>
								<div class="block-header__divider"></div>
							</div>
							<div class="block-product-columns__column">
								<div class="block-product-columns__item">
									<div class="product-card product-card--layout--horizontal">
										<button class="product-card__quickview" type="button">
											<svg width="16px" height="16px">
												<use xlink:href="images/sprite.svg#quickview-16"></use>
											</svg> <span class="fake-svg-icon"></span></button>
										<div class="product-card__image">
											<a href="product.html"><img src="images/products/product-7.jpg" alt=""></a>
										</div>
										<div class="product-card__info">
											<div class="product-card__name"><a href="product.html">Brandix Pliers</a></div>
											<div class="product-card__rating">
												<div class="rating">
													<div class="rating__body">
														<svg class="rating__star rating__star--active" width="13px" height="12px">
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
														<svg class="rating__star rating__star--active" width="13px" height="12px">
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
														<svg class="rating__star" width="13px" height="12px">
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
														<svg class="rating__star" width="13px" height="12px">
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
														<svg class="rating__star" width="13px" height="12px">
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
												<div class="product-card__rating-legend">4 Reviews</div>
											</div>
											<ul class="product-card__features-list">
												<li>Speed: 750 RPM</li>
												<li>Power Source: Cordless-Electric</li>
												<li>Battery Cell Type: Lithium</li>
												<li>Voltage: 20 Volts</li>
												<li>Battery Capacity: 2 Ah</li>
											</ul>
										</div>
										<div class="product-card__actions">
											<div class="product-card__availability">Availability: <span class="text-success">In Stock</span></div>
											<div class="product-card__prices">$24.00</div>
											<div class="product-card__buttons">
												<button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
												<button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
												<button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
													<svg width="16px" height="16px">
														<use xlink:href="images/sprite.svg#wishlist-16"></use>
													</svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
												<button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
													<svg width="16px" height="16px">
														<use xlink:href="images/sprite.svg#compare-16"></use>
													</svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
											</div>
										</div>
									</div>
								</div>
								<div class="block-product-columns__item">
									<div class="product-card product-card--layout--horizontal">
										<button class="product-card__quickview" type="button">
											<svg width="16px" height="16px">
												<use xlink:href="images/sprite.svg#quickview-16"></use>
											</svg> <span class="fake-svg-icon"></span></button>
										<div class="product-card__image">
											<a href="product.html"><img src="images/products/product-8.jpg" alt=""></a>
										</div>
										<div class="product-card__info">
											<div class="product-card__name"><a href="product.html">Water Hose 40cm</a></div>
											<div class="product-card__rating">
												<div class="rating">
													<div class="rating__body">
														<svg class="rating__star rating__star--active" width="13px" height="12px">
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
														<svg class="rating__star rating__star--active" width="13px" height="12px">
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
														<svg class="rating__star" width="13px" height="12px">
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
														<svg class="rating__star" width="13px" height="12px">
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
														<svg class="rating__star" width="13px" height="12px">
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
												<div class="product-card__rating-legend">4 Reviews</div>
											</div>
											<ul class="product-card__features-list">
												<li>Speed: 750 RPM</li>
												<li>Power Source: Cordless-Electric</li>
												<li>Battery Cell Type: Lithium</li>
												<li>Voltage: 20 Volts</li>
												<li>Battery Capacity: 2 Ah</li>
											</ul>
										</div>
										<div class="product-card__actions">
											<div class="product-card__availability">Availability: <span class="text-success">In Stock</span></div>
											<div class="product-card__prices">$15.00</div>
											<div class="product-card__buttons">
												<button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
												<button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
												<button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
													<svg width="16px" height="16px">
														<use xlink:href="images/sprite.svg#wishlist-16"></use>
													</svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
												<button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
													<svg width="16px" height="16px">
														<use xlink:href="images/sprite.svg#compare-16"></use>
													</svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
											</div>
										</div>
									</div>
								</div>
								<div class="block-product-columns__item">
									<div class="product-card product-card--layout--horizontal">
										<button class="product-card__quickview" type="button">
											<svg width="16px" height="16px">
												<use xlink:href="images/sprite.svg#quickview-16"></use>
											</svg> <span class="fake-svg-icon"></span></button>
										<div class="product-card__image">
											<a href="product.html"><img src="images/products/product-9.jpg" alt=""></a>
										</div>
										<div class="product-card__info">
											<div class="product-card__name"><a href="product.html">Spanner Wrench</a></div>
											<div class="product-card__rating">
												<div class="rating">
													<div class="rating__body">
														<svg class="rating__star rating__star--active" width="13px" height="12px">
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
														<svg class="rating__star rating__star--active" width="13px" height="12px">
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
														<svg class="rating__star rating__star--active" width="13px" height="12px">
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
														<svg class="rating__star rating__star--active" width="13px" height="12px">
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
														<svg class="rating__star" width="13px" height="12px">
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
												<div class="product-card__rating-legend">9 Reviews</div>
											</div>
											<ul class="product-card__features-list">
												<li>Speed: 750 RPM</li>
												<li>Power Source: Cordless-Electric</li>
												<li>Battery Cell Type: Lithium</li>
												<li>Voltage: 20 Volts</li>
												<li>Battery Capacity: 2 Ah</li>
											</ul>
										</div>
										<div class="product-card__actions">
											<div class="product-card__availability">Availability: <span class="text-success">In Stock</span></div>
											<div class="product-card__prices">$19.00</div>
											<div class="product-card__buttons">
												<button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
												<button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
												<button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
													<svg width="16px" height="16px">
														<use xlink:href="images/sprite.svg#wishlist-16"></use>
													</svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
												<button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
													<svg width="16px" height="16px">
														<use xlink:href="images/sprite.svg#compare-16"></use>
													</svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- .block-product-columns / end -->


















		</div>
		<!-- site__body / end -->
		@endsection