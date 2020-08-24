@extends('backend.template.layout')

@section('dashboard-content')
<!-- section start -->
<div class="br-mainpanel">

	<!-- title row start -->
	<div class="br-pagetitle">
		<i class="icon ion-ios-home-outline"></i>
		<div>
			<h4>Division List</h4>
			<p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
		</div>
	</div>
	<!-- title row end -->

	<!-- main body content start -->
	<div class="br-pagebody">

		<!-- section wrapper start -->
		<div class="br-section-wrapper">

			<h6 class="br-section-label">All Division</h6>

			<!-- data insert flash message start -->
				<div class="col-md-12">
					@if( session()->has('message') )
					<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true" > &times; </button>
						{{ session()->get('message') }}
					</div>
					@endif
				</div>
				<!-- data insert flash message end -->

				<!-- data delete flash message start -->
				<div class="col-md-12">
					@if( session()->has('delete') )
					<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true" > &times; </button>
						{{ session()->get('delete') }}
					</div>
					@endif
				</div>
				<!-- data delete flash message end -->

				<!-- data update flash message start -->
				<div class="col-md-12">
					@if( session()->has('update') )
					<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true" > &times; </button>
						{{ session()->get('update') }}
					</div>
					@endif
				</div>
				<!-- data update flash message end -->

			<!-- row start -->
			<div class="row">

				<!-- category list item table start -->
				<div class="col-md-12">
					<div class="category_list_table">
						<table class="table table-striped" id="myTable">
							<thead>
								<tr>
									<th scope="col">#SI</th>
									<th scope="col">Division Name</th>
									<th scope="col">Priority List</th>
									<th scope="col">Action</th>
								</tr>
							</thead>
							<tbody>
								@php
									$i = 1;
								@endphp
								@foreach( $divisions as $division )
								<tr>
									<th scope="row">{{ $i }}</th>
									<td>{{ $division->name }}</td>
									<td>{{ $division->priority }}</td>
									<td>
										<a href="{{ route('editDivision',$division->id) }}" class="badge badge-success">Update</a>
										
										<button type="submit" class="badge badge-danger" data-toggle="modal" data-target="#deleteDivision{{ $division->id }}">Delete</button>
									</td>

									<!-- delete modal start -->
									<div class="modal fade" id="deleteDivision{{ $division->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									  	<div class="modal-dialog" role="document">
									    	<div class="modal-content">
									      		<div class="modal-header">
									        		<h5 class="modal-title" id="exampleModalLabel">Are you sure want to delete this?</h5>
									        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									          		<span aria-hidden="true">&times;</span>
									        		</button>
									      		</div>
										      	<div class="modal-body" style="display: block;margin: 0 auto;">
										        	<form action="{{ route('deleteDivision',$division->id) }}" method="post">
										        		@csrf
										        		<button type="submit" class="btn btn-success">Yes</button>
										        	</form>
										        	<button type="submit" class="btn btn-danger" data-dismiss="modal">No</button>
									      		</div>
									   	 	</div>
									  	</div>
									</div>
									<!-- delete modal end -->

								</tr>
								@php
									$i++;
								@endphp
								@endforeach
							</tbody>
						</table>
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