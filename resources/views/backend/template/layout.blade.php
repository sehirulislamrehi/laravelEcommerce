<!DOCTYPE html>
<html lang="en">

<head>
  @include ('backend.include.header')
  @include ('backend.include.css')
</head>

<body>

  <!-- ########## START: LEFT PANEL ########## -->
  @include ('backend.include.menu')
  <!-- ########## END: LEFT PANEL ########## -->

  <!-- ########## START: HEAD PANEL ########## -->
  @include ('backend.include.topbar')
  <!-- ########## END: HEAD PANEL ########## -->

  <!-- ########## START: RIGHT PANEL ########## -->
  @include ('backend.include.message')
  <!-- ########## END: RIGHT PANEL ########## --->

  <!-- ########## START: MAIN PANEL ########## -->
  <!-- MY MODAL -->
  <div class="modal fade" id="editModal" role="dialog" aria-labelledby="modal-default-header">
    <div class="modal-dialog" role="document">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="icon-cross"></span></button>
      <div class="modal-content">

      </div>
    </div>
  </div>
  <!-- MY MODAL LARGE END -->
  @yield ('dashboard-content')
  @include ('backend.include.footer')
  </div><!-- br-mainpanel -->
  <!-- ########## END: MAIN PANEL ########## -->

  @include ('backend.include.script')
</body>

</html>