@extends('control.app')
@section('content')

<div class="content-wrapper pt-3">
 <div class="container" style="margin-top:-5%">
     <br><br>
      <div class="card card-outline ">
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <button class="btn  btn-val"><a href="{{ route('register') }}" style="color:white !important;"  >
              Add User</a></button>
             </div>
           </div>
         </div>
        </div>
      </div>

       <section class="content " style="margin-top:-4%">
 
    <div class="container">
      <br><br>
      <div class="card card-outline card-primary">
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <div class="table-responsive">
                <table class="table table-bordered table-stripped" id="totaluser-table">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th>Active</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  </div>
@endsection

@push('scripts')
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/select/1.6.2/js/dataTables.select.min.js"></script>

   <script type="text/javascript">
    (function($){
        $(document).ready(function() {
            $('#totaluser-table').DataTable({
                dom: 'Blfrtip',
                buttons: [  
                  'copyHtml5',
                  'excelHtml5',
                  'csvHtml5',
                  'pdfHtml5'
                ],
              
                processing: true,
                serverSide: true,
                lengthMenu: [
                  [10, 25, 50, 100, -1],
                  [10, 25, 50, 100, 'All']
                ],
                order: [
                  [0, "desc"]
                ],
                ajax: "{{ route('data_all_user') }}",
                columns: [
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'role', name: 'role' },
                    { data: 'is_active', name: 'is_active' }, // Ensure this is included
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ]
            });
        });
    })(jQuery);
</script>


@endpush