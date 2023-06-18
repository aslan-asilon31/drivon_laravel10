<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use DB;
use Storage;
use Yajra\DataTables\Facades\Datatables;

class VehicleController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Vehicle::select('*');

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('image', function($user) {
                    return '<img src="'.Storage::url('public/vehicles/').$user->image.'" class="rounded" style="width: 50px">';
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . route('vehicles.show', $row->id) . '" class="detail btn btn-info btn-sm" style="color:white;"> <i class="fa fa-eye"></i> </a>';
                    $actionBtn .= '<a href="' . route('vehicles.edit', $row->id) . '" class="edit btn btn-success btn-sm"> <i class="fa fa-edit"></i> </a>';
                    $actionBtn .= '<a href="' . route('vehicles.destroy', $row->id) . '" class="delete btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </a>';
                    return $actionBtn;
                })
                ->rawColumns(['image','action'])
                ->make(true);
        }

        return view('vehicles.index');
    }
  
    public function create()
    {
        return view('vehicles.create');
    }

    public function show($id)
    {
        $vehicles = Vehicle::all();
        $vehicles = Vehicle::find($id);

        if (!$vehicles) {
            return redirect()->back()->with('error', 'Vehicle not found.');
        }

        // return view('vechile.detail', compact('vehicles','vehicledetails'));
    }

    public function store(Request $request)
    {

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/vehicles', $image->hashName());

        $vehicle = Vehicle::create([
            'id'     => $request->id,
            'name'     => $request->name,
            'image'     => $image->hashName(),
            'type'     => $request->type,
            'slug'     => $request->slug,
        ]);

        return redirect()->route('vehicles.index');
    }


    public function edit(Vehicle $vehicle)
    {
        return view('vehicles.edit', compact('vehicle'));
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        //get data Vehicle by ID
        $vehicle = Vehicle::findOrFail($vehicle->id);

        if($request->file('image') == "") {

            $vehicle->update([
                // 'id'       => $request->id,
                'name'     => $request->name,
                'type'     => $request->type,
                'slug'     => $request->slug,
            ]);

        } else {

            //hapus old image
            Storage::disk('local')->delete('public/vehicles/'.$vehicle->image);

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/vehicles', $image->hashName());

            $vehicle->update([
                'image'     => $image->hashName(),
                'name'     => $request->name,
                'slug'   => $request->slug,
            ]);

        }

        if($vehicle){
            return redirect()->route('vehicles.index');
        }else{
            return redirect()->route('vehicles.index');
        }
    }


    public function destroy($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        Storage::disk('local')->delete('public/vehicles/'.$vehicle->image);
        $vehicle->delete();
            return redirect()->route('vehicles.index');

    }
}
