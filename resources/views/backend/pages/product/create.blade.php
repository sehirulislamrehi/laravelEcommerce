@extends('backend.template.layout')

@section('dashboard-content')
<!-- section start -->
<div class="br-mainpanel">

	<!-- title row start -->
	<div class="br-pagetitle">
		<i class="icon ion-ios-home-outline"></i>
		<div>
			<h4>Upload a new product</h4>
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
						<form action="{{ route('storeProduct') }}" method="post" enctype="multipart/form-data">
							@csrf

							<!-- category name -->
							<div class="form-group">
								<label>Product Title</label>
								<input type="text" class="form-control" name="product_title">
							</div>

							<!-- description -->
							<div class="form-group">
								<label>Product Description</label>
								<textarea class="form-control" name="product_description" rows="3"></textarea>
							</div>

							<div class="form-group">
								<label>Regular Price</label>
								<input type="text" class="form-control" name="r_price">
							</div>

							<div class="form-group">
								<label>Offer Price</label>
								<input type="text" class="form-control" name="o_price">
							</div>

							<div class="form-group">
								<label>Quantity</label>
								<input type="text" class="form-control" name="quantity">
							</div>

							<div class="form-group">
								<label>Product Status</label>
								<select name="status" class="form-control">
									<option>Select product status</option>
									<option value="1">Active </option>
									<option value="0">Inactive </option>
								</select>
							</div>

							<div class="form-group">
								<label>Is featured?</label>
								<select name="feature" class="form-control">
									<option>Please product feature yes or no</option>
									<option value="1">Yes </option>
									<option value="0">No </option>
								</select>
							</div>

							<div class="form-group">
								<label>Select Brand</label>
								<select name="brand_id" class="form-control">
									<option>Please select a product brand</option>
									 @foreach( App\Models\Backend\Brand::orderBy('name','asc')->get() as $brand )
										<option value="{{ $brand->id }}">{{ $brand->name }} </option>
									@endforeach
								</select>
							</div>

							<div class="form-group">
								<label>Select Category</label>
								<select name="category_id" class="form-control">
									<option>Please select a product category </option>
									 @foreach( App\Models\Backend\Category::orderBy('name','asc')->where('parent_id',0)->get() as $parent )
										<option value="{{ $parent->id }}"> {{ $parent->name }} </option>

										@foreach( App\Models\Backend\Category::orderBy('name','asc')->where('parent_id',$parent->id)->get() as $child )
											<option value="{{ $child->id }}"  > -{{ $child->name }} </option>
										@endforeach

									@endforeach


								</select>
							</div>

							<!-- image -->
							<div class="form-group">
								<label>Product Main Thumbnail</label>
								<input type="file" name="p_image[]" class="form-control-file">
							</div>

							<div class="row">
								
								<div class="col-md-3">
									<div class="form-group">
										<label>Product Thumbnail one</label>
										<input type="file" name="p_image[]" class="form-control-file">
									</div>
								</div>

								<div class="col-md-3">
									<div class="form-group">
										<label>Product Thumbnail two</label>
										<input type="file" name="p_image[]" class="form-control-file">
									</div>
								</div>

								<div class="col-md-3">
									<div class="form-group">
										<label>Product Thumbnail three</label>
										<input type="file" name="p_image[]" class="form-control-file">
									</div>
								</div>

								<div class="col-md-3">
									<div class="form-group">
										<label>Product Thumbnail four</label>
										<input type="file" name="p_image[]" class="form-control-file">
									</div>
								</div>

							</div>

							<div class="form-group">
								<input type="submit" class="btn btn-primary" value="Add Product" name="addBrand">
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