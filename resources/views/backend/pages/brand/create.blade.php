@extends('backend.template.layout')

@section('dashboard-content')
<!-- section start -->
<div class="br-mainpanel">

	<!-- title row start -->
	<div class="br-pagetitle">
		<i class="icon ion-ios-home-outline"></i>
		<div>
			<h4>Add New Brand</h4>
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
						<form action="{{ route('storeBrand') }}" method="post" enctype="multipart/form-data">
							@csrf

							<!-- category name -->
							<div class="form-group">
								<label>Brand Name</label>
								<input type="text" class="form-control" name="brand_name">
							</div>

							<!-- description -->
							<div class="form-group">
								<label>Brand Description</label>
								<textarea class="form-control" name="brand_description" rows="3"></textarea>
							</div>

							<!-- image -->
							<div class="form-group">
								<label>Brand Thumbnail</label>
								<input type="file" name="image" class="form-control-file">
							</div>

							<div class="form-group">
								<input type="submit" class="btn btn-primary" value="Add Brand" name="addBrand">
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