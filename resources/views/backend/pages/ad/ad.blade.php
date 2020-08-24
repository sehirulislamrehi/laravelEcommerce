@extends('backend.template.layout')

@section('dashboard-content')
<!-- section start -->
<div class="br-mainpanel">

	<!-- title row start -->
	<div class="br-pagetitle">
		<i class="icon ion-ios-home-outline"></i>
		<div>
			<h4>Manage Advertisement</h4>
			<p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
		</div>
	</div>
	<!-- title row end -->

	<!-- main body content start -->
	<div class="br-pagebody">

		<!-- section wrapper start -->
		<div class="br-section-wrapper">

			<!--add ad row start -->
			<div class="row">
                <div class="col-md-6">
                    <h2>Advertisement</h2>
                </div>

                <div class="col-md-6 text-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addAdvertisement">
                        Add Advertisement
                    </button>
                </div>
			</div>
			<!--add ad row end -->

            <!-- ad table row start -->
            <div class="row">
                <div class="col-md-12">
                <table class="table table-striped" id="myTable" >
                    <thead>
                        <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody id="adTable">
                        @php
                            $i = 1
                        @endphp
                        @foreach( $ads as $ad )
                        <tr class="table-row" data-id="{{ $ad->id }}">
                            <td class="ad-image">
                                <img src="{{ asset('images/ad/' . $ad->image ) }}" width="50px">
                            </td>
                            <td class="ad-title">{{ $ad->title }}</td>
                            <td class="ad-description">{{ $ad->description }}</td>
                            <td>
                                <button class="btn btn-primary edit" data-toggle="modal" data-target="#editadvertisement">Edit</button>
                                <button class="btn btn-danger delete" data-toggle="modal" data-target="#deleteadvertisement">Delete</button>
                            </td>
                        </tr>
                        @php
                            $i++
                        @endphp
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
            <!-- ad table row end -->

		</div>
		<!-- section wrapper end -->

        <!-- Add Advertisement Modal start-->
        <div class="modal fade" id="addAdvertisement" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Advertisement</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form  id="createAd" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div id="successMsg"></div>
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <img id="image_preview_container" src="{{ asset('images/image-preview.png') }}"
                            alt="preview image" style="max-height: 150px;"> <br> <br>
                            <input type="file" id="image" class="form-control-file" name="image">
                        </div>
                        <div class="form-group">
                           <button type="submit" class="btn btn-primary" >Add</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
                </div>
            </div>
        </div>
        <!-- Add Advertisement Modal end-->

        <!-- edit Advertisement Modal start-->
        <div class="modal fade" id="editadvertisement" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Advertisement</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form  id="editAd" enctype="multipart/form-data">
                        @csrf
                        <div id="successMsg"></div>
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" id="editName" class="form-control" name="title">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" id="editDescription" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <img id="editImage" src="" width="150px"> <br> <br>
                            <input type="file" class="form-control-file" name="image">
                        </div>
                        <div class="form-group">
                           <button type="submit" class="btn btn-primary" >Update</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
                </div>
            </div>
        </div>
        <!-- edit Advertisement Modal end-->

        <!-- delete Advertisement Modal start-->
        <div class="modal fade" id="deleteadvertisement" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure want to delete this advertisement?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <form id="deleteAd">
                        <button type="submit" class="btn btn-success">Yes</button>
                    </form>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                </div>
                </div>
            </div>
        </div>
        <!-- delete Advertisement Modal end-->
		
	</div>
	<!-- main body content end -->

    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        });
    </script>
    
@endsection