<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	@include('frontend.include.header')
	
	@include('frontend.include.css')

	@include('frontend.include.script')
	
</head>

<body>
	<!-- quickview-modal -->
	@include('frontend.include.modal')
	<!-- quickview-modal / end -->

	<!-- mobilemenu -->
	@include('frontend.include.menu')
	
	@yield ('body-content')

	@include('frontend.include.footer');

	</div>
	<!-- site / end -->
</body>

</html>