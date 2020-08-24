@extends('backend.template.layout')

@section('dashboard-content')
<!-- section start -->
<div class="br-mainpanel">

	<!-- title row start -->
	<div class="br-pagetitle">
		<i class="icon ion-ios-home-outline"></i>
		<div>
			<h4>Create New Division</h4>
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
						<form action="{{ route('storeDivision') }}" method="post" enctype="multipart/form-data">
							@csrf

							<!-- division name -->
							<div class="form-group">
								<label>Division Name</label>
								<input type="text" class="form-control" name="name">
							</div>

							<!-- priority list -->
							<div class="form-group">
								<label>Priority Number</label>
								<input type="text" class="form-control" name="priority">
							</div>

							<div class="form-group">
								<input type="submit" class="btn btn-primary" value="Add Division" name="addDivision">
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