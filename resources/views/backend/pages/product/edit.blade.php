@extends('backend.template.layout')

@section('dashboard-content')
<!-- section start -->
<div class="br-mainpanel">

	<!-- title row start -->
	<div class="br-pagetitle">
		<i class="icon ion-ios-home-outline"></i>
		<div>
			<h4>Edit product</h4>
			<p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
		</div>
	</div>
	<!-- title row end -->

	<!-- main body content start -->
	<div class="br-pagebody">

		<!-- section wrapper start -->
		<div class="br-section-wrapper">

			<!-- row start -->
			<div class="row">

				<!-- Brand list item table start -->
				<div class="col-md-12">
					<div class="Brand_list_table">
						<!-- create Brand form start -->
						<form action="{{ route('updateProduct', $product->slug) }}" method="post" enctype="multipart/form-data">
							@csrf

							<!-- category name -->
							<div class="form-group">
								<label>Product Title</label>
								<input type="text" class="form-control" name="product_title" value="{{ $product->title }}">
							</div>

							<!-- description -->
							<div class="form-group">
								<label>Product Description</label>
								<textarea class="form-control" name="product_description" rows="3">{{ $product->description }}</textarea>
							</div>

							<div class="form-group">
								<label>Regular Price</label>
								<input type="text" class="form-control" name="r_price" value="{{ $product->regular_price }}">
							</div>

							<div class="form-group">
								<label>Offer Price</label>
								<input type="text" class="form-control" name="o_price" value="{{ $product->offer_price }}">
							</div>

							<div class="form-group">
								<label>Quantity</label>
								<input type="text" class="form-control" name="quantity" value="{{ $product->quantity }}">
							</div>

							<div class="form-group">
								<label>Product Status</label>
								<select name="status" class="form-control">
									<option>Select product status</option>
									<option value="1" @if( $product->status == 1 ) selected @endif >Active </option>
									<option value="0" @if( $product->status == 0 ) selected @endif >Inactive </option>
								</select>
							</div>

							<div class="form-group">
								<label>Is featured?</label>
								<select name="feature" class="form-control">
									<option>Please product feature yes or no</option>
									<option value="1" @if( $product->is_featured == 1 ) selected @endif  >Yes </option>
									<option value="0" @if( $product->is_featured == 0 ) selected @endif  >No </option>
								</select>
							</div>

							<div class="form-group">
								<label>Select Brand</label>
								<select name="brand_id" class="form-control">
									<option>Please select a product brand</option>
									 @foreach( App\Models\Backend\Brand::orderBy('name','asc')->get() as $brand )
										<option value="{{ $brand->id }}" @if( $product->brand_id == $brand->id ) selected @endif >{{ $brand->name }} </option>
									@endforeach
								</select>
							</div>

							<div class="form-group">
								<label>Select Category</label>
								<select name="category_id" class="form-control">
									<option>Please select a product category </option>
									 @foreach( App\Models\Backend\Category::orderBy('name','asc')->where('parent_id',0)->get() as $parent )
										<option value="{{ $parent->id }}" @if( $product->category_id == $parent->id ) selected @endif > {{ $parent->name }} </option>

										@foreach( App\Models\Backend\Category::orderBy('name','asc')->where('parent_id',$parent->id)->get() as $child )
											<option value="{{ $child->id }}" @if( $product->category_id == $child->id ) selected @endif  > -{{ $child->name }} </option>
										@endforeach

									@endforeach


								</select>
							</div>

							<!-- image -->
							<div class="form-group">
								<label>Product Main Thumbnail</label><br>
							
									@php
										$i = 0;
									@endphp
									@foreach( $product->images as $image )
									@if( $i == 0 )
									<img src="{{ asset('images/products/' . $image->image ) }}" width="100px;">
									@endif
									@php
										$i++;
									@endphp
									@endforeach
								
								<br><br>
								<input type="file" name="p_image" class="form-control-file">
							</div>

							<div class="row">
								
								<div class="col-md-3">
									<div class="form-group">
										<label>Product Thumbnail one</label>

										<br>
											
											@php
												$i = 2;
											@endphp
											@foreach( $product->images as $image )
											@php
												$i--;
											@endphp
											@if( $i == 0 )
											<img src="{{ asset('images/products/' . $image->image ) }}" width="100px;">
											@else
											@endif
											
											@endforeach
												
										<br><br>

										<input type="file" name="p1_image" class="form-control-file">
									</div>
								</div>

								<div class="col-md-3">
									<div class="form-group">
										<label>Product Thumbnail two</label>
										<br>
							
										@php
											$i = 3;
										@endphp
										@foreach( $product->images as $image )
										@php
											$i--;
										@endphp
										@if( $i == 0 )
										<img src="{{ asset('images/products/' . $image->image ) }}" width="100px;">
										@else
										@endif
										
										@endforeach
								
								<br><br>
										<input type="file" name="p2_image" class="form-control-file">
									</div>
								</div>

								<div class="col-md-3">
									<div class="form-group">
										<label>Product Thumbnail three</label>
										<br>
							
										@php
											$i = 4;
										@endphp
										@foreach( $product->images as $image )
										@php
											$i--;
										@endphp
										@if( $i == 0 )
										<img src="{{ asset('images/products/' . $image->image ) }}" width="100px;">
										@else
										@endif
										
										@endforeach
								
								<br><br>
										<input type="file" name="p3_image" class="form-control-file">
									</div>
								</div>

								<div class="col-md-3">
									<div class="form-group">
										<label>Product Thumbnail four</label>
										<br>
											@php
												$i = 5;
											@endphp
											@foreach( $product->images as $image )
											@php
												$i--;
											@endphp
											@if( $i == 0 )
											<img src="{{ asset('images/products/' . $image->image ) }}" width="100px;">
											@else
											@endif
											
											@endforeach
									
								<br><br>
										<input type="file" name="p4_image" class="form-control-file">
									</div>
								</div>

							</div>

							<div class="form-group">
								<input type="submit" class="btn btn-primary" value="Edit Product" name="addBrand">
							</div>

						</form>
						<!-- create Brand form end -->
					</div>
				</div>
				<!-- Brand list item table end -->

			</div>
			<!-- row end -->

		</div>
		<!-- section wrapper end -->
		
	</div>
	<!-- main body content end -->


@endsection