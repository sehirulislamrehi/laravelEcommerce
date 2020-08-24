@extends('backend.template.layout')

@section('dashboard-content')
<!-- section start -->
<div class="br-mainpanel">

	<!-- title row start -->
	<div class="br-pagetitle">
		<i class="icon ion-ios-home-outline"></i>
		<div>
			<h4>Edit Banner</h4>
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
						<form action="{{ route('updateBanner', $banner->slug ) }}" method="post" enctype="multipart/form-data">
							@csrf

							<!-- category name -->
							<div class="form-group">
								<label>Banner Tittle</label>
								<input type="text" class="form-control" name="title" value="{{ $banner->title }}">
							</div>

							<div class="form-group">
								<label>Banner Button Link</label>
								<input type="text" class="form-control" name="link" value="{{ $banner->link }}">
							</div>

							<!-- description -->
							<div class="form-group">
								<label>Banner Description</label>
								<textarea class="form-control" name="description" rows="3">{{ $banner->description }}</textarea>
							</div>

							<!-- image -->
							<div class="form-group">
								<label>Banner Thumbnail</label>
								<input type="file" name="image" class="form-control-file"><br>
								<img src="{{ asset('images/banner/' . $banner->image ) }}" width="250px">
							</div>

							<div class="form-group">
								<input type="submit" class="btn btn-primary" value="Update" >
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