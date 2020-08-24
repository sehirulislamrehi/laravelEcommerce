@extends('backend.template.layout')

@section('dashboard-content')
<!-- section start -->
<div class="br-mainpanel">

	<!-- title row start -->
	<div class="br-pagetitle">
		<i class="icon ion-ios-home-outline"></i>
		<div>
			<h4>Brand</h4>
			<p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
		</div>
	</div>
	<!-- title row end -->

	<!-- main body content start -->
	<div class="br-pagebody">

		<!-- section wrapper start -->
		<div class="br-section-wrapper">

			<h6 class="br-section-label">All Brand</h6>

			<div class="row">

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

			</div>

			<!-- row start -->
			<div class="row">

				<!-- category list item table start -->
				<div class="col-md-12">
					<div class="category_list_table">
						<table class="table table-striped" id="myTable">
							<thead>
								<tr>
									<th scope="col">#SI</th>
									<th scope="col">Name</th>
									<th scope="col">Slug</th>
									<th scope="col">Description</th>
									<th scope="col">Image</th>
									<th scope="col">Action</th>
								</tr>
							</thead>
							<tbody>
								@php
									$i = 1;
								@endphp
								@foreach( $allBrand as $brand )
								<tr>
									<th scope="row">{{ $i }}</th>
									<td>{{ $brand->name }}</td>
									<td>{{ $brand->slug }}</td>
									<td>{{ $brand->description }}</td>
									<td>
										@if( $brand->image == NULL )
											<p class="badge badge-danger">No Image Attached</p>
										@else
											<img src="{{ asset('images/brand/' . $brand->image) }}" class="img-fluid" width="100px;">
										@endif
									</td>
									<td>
										<a href="{{ route('editBrand', $brand->id) }}" class="badge badge-success">Update</a>
										<button type="submit" class="badge badge-danger" data-toggle="modal" data-target="#deleteBrand{{ $brand->id }}">Delete</button>
									</td>
									<!-- Modal -->
									<div class="modal fade" id="deleteBrand{{ $brand->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									  <div class="modal-dialog" role="document">
									    <div class="modal-content">
									      
									      <div class="modal-header">
									        <h5 class="modal-title" id="exampleModalLabel">Are you sure want to delete this brand?</h5>
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									          <span aria-hidden="true">&times;</span>
									        </button>
									      </div>
									      
									      <div class="modal-body" style="display: block;margin: 0 auto;">
									      	<form action="{{ route('deleteBrand',$brand->id) }}" method="post">
									      		@csrf
									      		<button type="submit" class="btn btn-success">Yes</button>
									      	</form>
									        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
									      </div>

									    </div>
									  </div>
									</div>
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

	<script type="text/javascript">
		
	</script>


@endsection