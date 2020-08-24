@extends('frontend.template.layout')

@section('body-content')
<section class="visitor-form">
	<div class="container">
		<div class="row">

			<!-- visitor login start -->
			<div class="col-md-12">
				<h2 class="text-center">Register</h2>
			</div>
			<!-- visitor login end -->

			<!-- login form start -->
			<div class="col-md-6 offset-md-3">
				<form action="{{ route('createVisitor') }}" method="post">
					@csrf

					<div class="form-group">
						<label>Username</label>
						<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required  autofocus>
						@error('name')
		                    <span class="invalid-feedback" role="alert">
		                        <strong>{{ $message }}</strong>
		                    </span>
		                @enderror
					</div>

					<div class="form-group">
						<label>Email Address</label>
						<input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
						@error('email')
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $message }}</strong>
				                    </span>
				                @enderror
					</div>

					<div class="form-group">
						<label>Password</label>
						<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" >

		                @error('password')
		                    <span class="invalid-feedback" role="alert">
		                        <strong>{{ $message }}</strong>
		                    </span>
		                @enderror
					</div>

					<div class="form-group">
						<label>Re-write Password</label>
						<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" >
					</div>

					<div class="form-group">
						<button type="submit" class="form-control btn btn-warning">{{ __('Register') }}</button>
					</div>
					
				</form>
			</div>
			<!-- login form emnd -->

		</div>
	</div>
</section>
@endsection