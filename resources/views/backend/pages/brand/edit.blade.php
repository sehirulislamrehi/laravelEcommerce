@extends('backend.template.layout')

@section('dashboard-content')
<!-- section start -->
<div class="br-mainpanel">

	<!-- title row start -->
	<div class="br-pagetitle">
		<i class="icon ion-ios-home-outline"></i>
		<div>
			<h4>Update Brand</h4>
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

				<!-- category list item table start -->
				<div class="col-md-12">
					<div class="category_list_table">
						<!-- create category form start -->
						<form action="{{ route('updateBrand',$brand->id) }}" method="post" enctype="multipart/form-data">
							@csrf

							<!-- category name -->
							<div class="form-group">
								<label>Brand Name</label>
								<input type="text" class="form-control" name="brand_name" value="{{ $brand->name }}">
							</div>

							<!-- description -->
							<div class="form-group">
								<label>Brand Description</label>
								<textarea class="form-control" name="brand_description" rows="3">{{ $brand->description }}</textarea>
							</div>

							<!-- image -->
							<div class="form-group">
								<label>Brand Thumbnail</label><br>
								@if( $brand->image == NULL )
								<P class="badge badge-danger">No Image Uploaded</P>
								@else
								<img src="{{ asset('images/brand/' . $brand->image) }}" class="img-fluid" width="150px;">
								@endif
								<input type="file" name="image" class="form-control-file">
							</div>

							<div class="form-group">
								<input type="submit" class="btn btn-primary" value="Save Changes" name="saveChanges">
							</div>

						</form>
						<!-- create category form end -->
					</div>
				</div>
				<!-- category list item table end -->

			</div>
			<!-- row end -->

		</div>
		<!-- section wrapper end -->
		
	</div>
	<!-- main body content end -->


@endsection