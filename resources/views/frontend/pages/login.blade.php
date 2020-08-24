@extends('frontend.template.layout')

@section('body-content')
<section class="visitor-form">
	<div class="container">
		<div class="row">

			<!-- visitor login start -->
			<div class="col-md-12">
				<h2 class="text-center">Login</h2>
			</div>
			<!-- visitor login end -->

			<!-- login form start -->
			<div class="col-md-6 offset-md-3">
                <form method="POST" action='{{ url("login/visitor") }}' aria-label="{{ __('Login') }}">
					 @csrf
					<div class="form-group">
	                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter your Email" autofocus>

	                @error('email')
	                    <span class="invalid-feedback" role="alert">
	                        <strong>{{ $message }}</strong>
	                    </span>
	                @enderror
	            </div><!-- form-group -->

	            <div class="form-group">
	                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter your password">
	                @error('password')
	                    <span class="invalid-feedback" role="alert">
	                        <strong>{{ $message }}</strong>
	                    </span>
	                @enderror  
	            </div><!-- form-group -->


					<button type="submit" class="form-control btn btn-warning">{{ __('Login') }}</button>
				</form>
			</div>
			<!-- login form emnd -->

		</div>
	</div>
</section>
@endsection