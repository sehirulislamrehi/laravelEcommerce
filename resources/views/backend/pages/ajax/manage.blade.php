@extends('backend.template.layout')


@section('dashboard-content')
<!-- section start -->
<div class="br-mainpanel">

     <!-- title row start -->
     <div class="br-pagetitle">
          <i class="icon ion-ios-home-outline"></i>
          <div>
               <h4>Manage Ajax Crud</h4>
               <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
          </div>
     </div>
     <!-- title row end -->

     <!-- main body content start -->
     <div class="br-pagebody">

          <!-- section wrapper start -->
          <div class="br-section-wrapper">



               <div class="row">

                    <!-- data insert flash message start -->
                    <div class="col-md-12">
                         @if( session()->has('create') )
                         <div class="alert alert-success">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &times; </button>
                              {{ session()->get('create') }}
                         </div>
                         @endif
                    </div>
                    <!-- data insert flash message end -->

                    <!-- data delete flash message start -->
                    <div class="col-md-12">
                         @if( session()->has('delete') )
                         <div class="alert alert-success">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &times; </button>
                              {{ session()->get('delete') }}
                         </div>
                         @endif
                    </div>
                    <!-- data delete flash message end -->

                    <!-- data update flash message start -->
                    <div class="col-md-12">
                         @if( session()->has('update') )
                         <div class="alert alert-success">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &times; </button>
                              {{ session()->get('update') }}
                         </div>
                         @endif
                    </div>
                    <!-- data update flash message end -->

               </div>

               <div class="row" style="margin-bottom: 30px;">
                    <div class="col-md-12">
                         <!-- add row start -->
                         <!-- Button trigger modal -->
                         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                              Add
                         </button>

                         <!-- Modal -->
                         <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                   <div class="modal-content">
                                        <div class="modal-header">
                                             <h5 class="modal-title" id="exampleModalLabel">Add New ITem</h5>
                                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                             </button>
                                        </div>
                                        <div class="modal-body">
                                             <form action="{{ route('ajax.crud.add') }}" class="ajax-form" method="post" enctype="multipart/form-data">
                                                  <div class="form-group">
                                                       <input type="text" class="form-control" name="name" placeholder="Name">
                                                  </div>
                                                  <div class="form-group">
                                                       <input type="email" class="form-control" name="email" placeholder="Email">
                                                  </div>
                                                  <div class="form-group">
                                                       <button type="submit" class="btn btn-success">Add</button>
                                                  </div>
                                             </form>
                                        </div>
                                        <div class="modal-footer">
                                             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                   </div>
                              </div>
                         </div>
                         <!-- add row end -->
                    </div>
               </div>

               <!-- row start -->
               <div class="row">

                    <h6 class="br-section-label">All Item</h6>

                    <!-- category list item table start -->
                    <div class="col-md-12">
                         <div class="category_list_table table-responsive">
                              <table class="table table-bordered ajax-datatable">
                                   <thead>
                                        <tr>
                                             <th>Name</th>
                                             <th>Email</th>
                                             <th>Action</th>
                                        </tr>
                                   </thead>
                                   <tbody>
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

<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
  $(function () {
    
        $('.ajax-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('ajax.crud.all') }}",
        columns: [
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {
                data: 'action', 
                name: 'action', 
                orderable: false, 
            },
        ]
    });

          

    
    
  });
</script>