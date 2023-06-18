@extends('adminlte::page')

@section('title', 'Car')

@section('content_header')
    <h1>Edit Vehicles</h1>
@stop

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card border-0 shadow rounded">
            <div class="card-body">
                <form action="{{ route('vehicles.update', $vehicle->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label class="font-weight-bold">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $vehicle->name) }}" placeholder="Insert Name">
                    
                        <!-- error message untuk title -->
                        @error('name')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Image</label>
                        <img src="{{ Storage::url('public/vehicles/').$vehicle->image }}" class="rounded" style="width: 70px">
                        <input type="file" class="form-control" name="image">
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Type</label>
                        <select class="custom-select form-control-border" name="type">
                            {{-- <option value="">--Select Type--</option> --}}
                            <option value="car" {{ $vehicle->type === 'car' ? 'selected' : '' }}>Car</option>
                            <option value="motorcycle" {{ $vehicle->type === 'motorcycle' ? 'selected' : '' }}>Motorcycle</option>
                        </select>
                    
                        <!-- error message for type -->
                        @error('type')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    

                    <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                    <button type="reset" class="btn btn-md btn-warning">RESET</button>

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