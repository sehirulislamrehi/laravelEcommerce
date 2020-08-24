
@extends('frontend.template.layout')

@section('body-content')
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
						<p>Manage My Account</p>

						@if( session()->has('update') )
						<div class="alert alert-success alert-dismissible fade show" role="alert">
						  	<strong>Success!</strong> {{ session()->get('update') }}
						  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    	<span aria-hidden="true">&times;</span>
						  	</button>
						</div>
						@endif
						
						<!-- sidebar item start -->
						<div class="right-sidebar-item">

							<!-- user image row start -->
							<div class="row user-image">
								<div class="col-md-3">
									@if( Auth('visitor')->user()->image != NULL )
									<img src="{{ asset('images/visitors/' . Auth('visitor')->user()->image ) }}" class="img-fluid" width="40px">
									@else
									<img src="{{ asset('images/visitors/visitor.png') }}" class="img-fluid">
									@endif
								</div>
								<div class="col-md-9">
									<h3>{{ Auth('visitor')->user()->name }}</h3>
								</div>
							</div>
							<!-- user image row end -->

							<div class="row personal-information">
								<div class="col-md-3">
									<p>Email : </p>
								</div>
								<div class="col-md-9">
									<p>{{ Auth('visitor')->user()->email }}</p>
								</div>
							</div>

							<div class="row personal-information">
								<div class="col-md-3">
									<p>Contact : </p>
								</div>
								<div class="col-md-9">
									@if( Auth('visitor')->user()->phone != NULL )
									<p>{{ Auth('visitor')->user()->phone }}</p>
									@else
									<p>N/A</p>
									@endif
								</div>
							</div>

							<div class="row personal-information">
								<div class="col-md-3">
									<p>Shipping Address : </p>
								</div>
								<div class="col-md-9">
									@if( Auth('visitor')->user()->shipping_address != NULL )
									<p>{{ Auth('visitor')->user()->shipping_address }}</p>
									@else
									<p>N/A</p>
									@endif
								</div>
							</div>

							<div class="row personal-information">
								<div class="col-md-3">
									<p>Gender : </p>
								</div>
								<div class="col-md-9">
									@if( Auth('visitor')->user()->gender != NULL )

										@if( Auth('visitor')->user()->gender == 0 )
										<p>Men</p>
										@else
										<p>Women</p>
										@endif

									@else
									<p>N/A</p>
									@endif
								</div>
							</div>

							<div class="row personal-information">
								<div class="col-md-3">
									<p>IP Address : </p>
								</div>
								<div class="col-md-9">
									@if( Auth('visitor')->user()->ip_address != NULL )
									<p>{{ Auth('visitor')->user()->ip_address }}</p>
									@else
									<p>N/A</p>
									@endif
								</div>
							</div>
							<!-- personal information row end -->

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