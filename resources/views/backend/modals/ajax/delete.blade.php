<div class="modal-content">
     <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Are you sure want to delete this item?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
          </button>
     </div>
     <div class="modal-footer">
          <form action="{{ route('ajax.crud.delete', $ajax->id) }}" class="ajax-form" method="post" enctype="multipart/form-data">
               <button type="submit" class="btn btn-success">Yes</button>
          </form>
          <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
     </div>
</div>