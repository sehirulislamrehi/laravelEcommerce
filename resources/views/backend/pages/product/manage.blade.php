@extends('backend.template.layout')

@section('dashboard-content')
<!-- section start -->
<div class="br-mainpanel">

	<!-- title row start -->
	<div class="br-pagetitle">
		<i class="icon ion-ios-home-outline"></i>
		<div>
			<h4>Product</h4>
			<p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
		</div>
	</div>
	<!-- title row end -->

	<!-- main body content start -->
	<div class="br-pagebody">

		<!-- section wrapper start -->
		<div class="br-section-wrapper">

			<h6 class="br-section-label">All Products</h6>

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
									<th scope="col">Image</th>
									<th scope="col">Brand</th>
									<th scope="col">Category</th>
									<th scope="col">Name</th>
									<th scope="col">Slug</th>
									<th scope="col">Regular Price</th>
									<th scope="col">Offer Price</th>
									
									<th scope="col">Quantity</th>

									<th scope="col">Featured</th>

									<th scope="col">Status</th>
									<th scope="col">Action</th>
								</tr>
							</thead>
							<tbody>
								@php
									$i = 1;
								@endphp
								@foreach( $products as $product )
								<tr>
									<th scope="row">{{ $i }}</th>
									<td>
										@php
											$j = 1;
										@endphp
										@foreach( $product->images as $image )
											@if( $j > 0 )
											<img src="{{ asset('images/products/' . $image->image) }}"  width="25px">
											@endif
											@php
												$j--;
											@endphp
										@endforeach
									</td>

									<td>
											{{ $product->category->name }}
										
									</td>
									<td>
											{{ $product->brand->name }}
										
									</td>
									
									<td>{{ $product->title }}</td>
									<td>{{ $product->slug }}</td>
									<td>{{ $product->regular_price }} BDT</td>
									
									<td>
										@if( $product->offer_price == NULL )
											<p class="badge badge-danger">No offer available</p>
										@elseif( $product->offer_price != NULL )
											{{ $product->offer_price }} BDT
										@endif
									</td>

									<td>{{ $product->quantity }} pcs</td>

									<td>
										@if( $product->is_featured  == 1 )

											<p class="badge badge-success">Yes</p>

										@elseif( $product->is_featured  == 0 )
											<p class="badge badge-danger">No</p>
										@endif
									</td>

									<td>
										@if( $product->status  ==1 )

											<p class="badge badge-success">Active</p>

										@elseif( $product->status  ==0)
											<p class="badge badge-danger">Inactive</p>
										@endif
									</td>

									<td>
										<a href="{{ route('editProduct', $product->slug) }}" class="badge badge-success">Update</a>
										<button type="submit" class="badge badge-danger" data-toggle="modal" data-target="#deleteProduct{{ $product->slug }}">Delete</button>
									</td>

									<!-- delete modal start -->
									<div class="modal fade" id="deleteProduct{{ $product->slug }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									  	<div class="modal-dialog" role="document">
									    	<div class="modal-content">
									      		<div class="modal-header">
									        		<h5 class="modal-title" id="exampleModalLabel">Are you sure want to delete this?</h5>
									        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									          		<span aria-hidden="true">&times;</span>
									        		</button>
									      		</div>
										      	<div class="modal-body" style="display: block;margin: 0 auto;">
										        	<form action="{{ route('deleteProduct', $product->slug) }}" method="post">
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