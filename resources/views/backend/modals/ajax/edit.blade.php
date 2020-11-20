<div class="modal-content">
     <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit ITem</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
          </button>
     </div>
     <div class="modal-body">
          <form action="{{ route('ajax.crud.add') }}" class="ajax-form" method="post" enctype="multipart/form-data">
               <div class="form-group">
                    <input type="text" class="form-control" value="{{ $ajax->name }}" name="name" placeholder="Name">
               </div>
               <div class="form-group">
                    <input type="text" class="form-control" name="email" placeholder="Email">
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