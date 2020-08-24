@extends('backend.template.layout')

@section('dashboard-content')
<!-- section start -->
<div class="br-mainpanel">

	<!-- title row start -->
	<div class="br-pagetitle">
		<i class="icon ion-ios-home-outline"></i>
		<div>
			<h4>Create Category</h4>
			<p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
		</div>
	</div>
	<!-- title row end -->

	<!-- main body content start -->
	<div class="br-pagebody">

		<!-- section wrapper start -->
		<div class="br-section-wrapper">

			<h6 class="br-section-label">All category</h6>

			<!-- row start -->
			<div class="row">

				<!-- category list item table start -->
				<div class="col-md-12">
					<div class="category_list_table">
						<!-- create category form start -->
						<form action="{{ route('storeCategory') }}" method="post" enctype="multipart/form-data">
							@csrf

							<!-- category name -->
							<div class="form-group">
								<label>Category Name</label>
								<input type="text" class="form-control" name="cat_name">
							</div>

							<!-- description -->
							<div class="form-group">
								<label>Description</label>
								<textarea class="form-control" name="cat_description" rows="3"></textarea>
							</div>

							<!-- image -->
							<div class="form-group">
								<label>Category Thumbnail</label>
								<input type="file" name="image" class="form-control-file">
							</div>

							<!-- parent -->
							<div class="form-group">
								<label>Parent Category</label>
								<select class="form-control" name="parent_id">
									<option value="0">Select a primary category ( Optional )</option>
									@foreach( $parent_category as $parent )
									<option value="{{ $parent->id }}">{{ $parent->name }}</option>
									@endforeach
								</select>
							</div>

							<div class="form-group">
								<input type="submit" class="btn btn-primary" value="Add Category" name="addCategory">
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