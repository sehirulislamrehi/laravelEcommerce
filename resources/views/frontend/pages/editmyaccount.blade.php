@extends('frontend.template.layout')

@section('account-body-content')
<!-- site__body -->
<div class="site__body">
	

	<div class="block">
		<div class="container">
			
			<div class="row">
				
				<!-- left side start -->
				<div class="col-md-4">
					<div class="accoung-left-side">
						<!-- welcome message -->
						<p>Welcome! {{ Auth('visitor')->user()->name }} </p>

						<!-- sidebar itemmenu start -->
						<div class="left-sidebar-item">
							<p>My account</p>
							<ul>
								<li class="show-item"><a href="{{ route('account') }}">Manage My account</a></li>
								<li class="show-item"><a href="{{ route('editVisitor',Auth('visitor')->user()->id) }}">Edit My account</a></li>
							</ul>
						</div>
						<!-- sidebar item end -->

					</div>
				</div>
				<!-- left side end -->

				<!--- right side start -->
				<div class="col-md-8">
					<div class="accoung-right-side">
						
						<!-- sidebar item start -->
						<div class="right-sidebar-item">
							<p>Edit My Account</p>

							<form action="{{ route('updateVisitor', $visitor->id) }}" method="post" enctype="multipart/form-data">
								@csrf

								<div class="form-group user-image">
									<div class="row user-image">
										<div class="col-md-3">
											@if( $visitor->image != NULL )
											<img src="{{ asset('images/visitors/' . $visitor->image ) }}" class="img-fluid">
											@else
											<img src="{{ asset('images/visitors/visitor.png') }}" class="img-fluid">
											@endif
										</div>
										<div class="col-md-9 upload-image">
											<button class="btn btn-info">Upload </button>
											<input type="file" class="form-control-file" name="image">
										</div>
									</div>
								</div>

								<div class="form-group editacc">
									<label>Name</label>
									<input type="text" class="form-control" name="name" value="{{ $visitor->name }}">
								</div>

								<div class="form-group editacc">
									<label>Email</label>
									<input type="email" class="form-control" name="email" value="{{ $visitor->email }}">
								</div>

								<div class="form-group editacc">
									<label>Contact</label>
									<input type="text" class="form-control" name="phone" value="{{ $visitor->phone }}">
								</div>

								<div class="form-group editacc">
									<label>Shipping Address</label>
									<input type="text" class="form-control" name="shipping_address" value="{{ $visitor->shipping_address }}">
								</div>

								<div class="form-group editacc">
									<label>Gender</label>
									<select class="form-control" name="gender">
										<option>Please select your gender</option>
										<option value="0">Male</option>
										<option value="1">Female</option>
									</select>
								</div>

								<div class="form-group submit-btn">
									<input type="submit" class="btn" value="Update">
								</div>

							</form>

							<!-- user image row start -->
							
							<!-- user image row end -->


						</div>
						<!-- sidebar item end -->

					</div>
				</div>
				<!--- right side end -->

			</div>

		</div>
	</div>
</div>
<!-- site__body / end -->
@endsection