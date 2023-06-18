@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Payments</h1>
@stop

@section('content')

<div class="card">
    <div class="card-header">
      <h3 class="card-title">Condensed Full Width Table</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
      <table class="table table-sm data-table">
        <thead>
          <tr>
            <th>Vehicle Order</th>
            <th>Order ID</th>
            <th>Payment Code</th>
            <th>Name</th>
            <th>Price</th>
            <th>status</th>
            <th>Discount</th>
            <th>Total Price</th>
            <th>Quantity</th>
            <th>Amount</th>
            <th>Payment Method</th>
            <th>Slug</th>
            <th>Action</th>
          </tr>
        </thead>
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
    <link rel="stylesheet" href="/css/admin_custom.css">
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
            ajax: "{{ route('payments.index') }}",
            columns: [
                {data: 'vehicle_code', name: 'vehicle_code'},
                {data: 'order_id', name: 'order_id'},
                {data: 'payment_code', name: 'payment_code'},
                {data: 'name', name: 'name'},
                {data: 'price', name: 'price'},
                {data: 'status', name: 'status'},
                {data: 'discount', name: 'discount'},
                {data: 'total_price', name: 'total_price'},
                {data: 'quantity', name: 'quantity'},
                {data: 'amount', name: 'amount'},
                {data: 'payment_method', name: 'payment_method'},
                {data: 'slug', name: 'slug'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    });

</script>

{{-- End Yajra Data Table --}}
@stop