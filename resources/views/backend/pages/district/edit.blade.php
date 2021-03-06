@extends('backend.template.layout')

@section('dashboard-content')
<!-- section start -->
<div class="br-mainpanel">

	<!-- title row start -->
	<div class="br-pagetitle">
		<i class="icon ion-ios-home-outline"></i>
		<div>
			<h4>Update District</h4>
			<p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
		</div>
	</div>
	<!-- title row end -->

	<!-- main body content start -->
	<div class="br-pagebody">

		<!-- section wrapper start -->
		<div class="br-section-wrapper">

			<h6 class="br-section-label">Update District</h6>

			<!-- row start -->
			<div class="row">

				<!-- category list item table start -->
				<div class="col-md-12">
					<div class="category_list_table">
						<!-- create category form start -->
						<form action="{{ route('updateDistrict',$district->id) }}" method="post" enctype="multipart/form-data">
							@csrf

							<!-- district name -->
							<div class="form-group">
								<label>District Name</label>
								<input type="text" class="form-control" name="name" value="{{ $district->name }}">
							</div>

							<div class="form-group">
								<select class="form-control" name="division_id">
									<option>Select division</option>
									@foreach( App\Models\Backend\Division::orderBy('id','asc')->get() as $division )
									<option value="{{ $division->id }}" 
										@if( $division->id == $district->division_id ) 
											selected
										@endif 
									> 
										{{ $division->name }}
									<option>
									@endforeach
								</select>
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