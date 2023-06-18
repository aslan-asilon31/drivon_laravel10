@extends('adminlte::page')

@section('title', 'Permissions Management')

@section('content_header')
    <h1>Permissions Management</h1>
@stop

@section('content')
@include('sweetalert::alert')

<div class="card">
    <div class="card-header">
      @can('role-create')
      <a href="{{ route('permissions.create') }}" class="btn btn-md btn-success mb-3">  <i class="fa fa-plus"></i> </a>
      @endcan

      <a href="{{ route('user.export-pdf') }}" class="btn btn-md btn-danger mb-3">  <i class="fa fa-file-pdf"></i> </a>
      <a href="{{ route('user.export-excel') }}" class="btn btn-md btn-warning mb-3" style="color:white;">  <i class="fa fa-file-excel"></i> </a>
      <a href="{{ route('user.export-csv') }}" class="btn btn-md btn-info mb-3">  <i class="fa fa-file-csv"></i> </a>
      <a href="" type="button" class="btn btn-md   mb-3" data-toggle="modal" data-target="#myModal2" style="background-color: indigo;color:white;">  <i class="fa fa-upload"></i> </a>

      <div class="card-tools">
        <div class="input-group input-group-sm" style="width: 150px;">
          <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

          <div class="input-group-append">
            <button type="submit" class="btn btn-default">
              <i class="fas fa-search"></i>
            </button>
          </div>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div style="overflow-x:auto;white-space: nowrap;">
            
            
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            
            
            <table class="table table-bordered data-table">
              <tr>
                 <th>No</th>
                 <th>Name</th>
                 <th width="280px">Action</th>
              </tr>
            </table>

        </div>
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

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

@stop