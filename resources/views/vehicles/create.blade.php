@extends('adminlte::page')

@section('title', 'Car')

@section('content_header')
    <h1>Vehicles</h1>
@stop

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card border-0 shadow rounded">
            <div class="card-body">
                <form action="{{ route('vehicles.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="font-weight-bold">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Insert Name">
                    
                        <!-- error message untuk title -->
                        @error('name')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Image</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                    
                        <!-- error message untuk title -->
                        @error('image')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Type</label>
                        <select class="custom-select form-control-border" name="type">
                            <option>--Select Type--</option>
                            <option value="car">Car</option>
                            <option value="motorcycle">Motorcycle</option>
                        </select>
                    
                        <!-- error message untuk content -->
                        @error('content')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-md btn-primary">Save</button>
                    <button type="reset" class="btn btn-md btn-warning">Reset</button>

                </form> 
            </div>
        </div>
    </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop