@extends('adminlte::page')

@section('title', 'Car')

@section('content_header')
    <h1>Vehicles</h1>
@stop

@section('content')

<div class="card">
    <div class="card-header">
      <a class="m-1" href="{{ route('vehicles.create') }}"> <i class="fa fa-md fa-plus"></i> </a>
      <a class="m-1" type="button" href=""> <i class="fa fa-md fa-file-pdf"></i> </a>
      <a class="m-1" type="button" href=""> <i class="fa fa-md fa-file-excel"></i> </a>
      <a class="m-1" type="button" href=""> <i class="fa fa-md fa-file-csv"></i> </a>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
      <table class="table table-sm data-table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Image</th>
            <th>Pickup Location</th>
            <th>Drop Location</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="vehicles-table">
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

@stop

@section('css')
    {{-- Yajra DataTable --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    {{-- End Yajra DataTable --}}
@stop

@section('js')

{{-- Yajra Data Table --}}
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script type="text/javascript">
    var table;

    $(function () {
        table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('vehicles.index') }}",
            columns: [
                {data: 'name', name: 'name'},
                {data: 'image', name: 'image'},
                {data: 'pickup_location', name: 'pickup_location'},
                {data: 'drop_location', name: 'drop_location'},
                {data: 'start_time', name: 'start_time'},
                {data: 'end_time', name: 'end_time'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    });

</script>

{{-- End Yajra Data Table --}}
@stop