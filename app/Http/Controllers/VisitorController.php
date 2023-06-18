<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;

class VisitorController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::all();
        $cars = Vehicle::all()->where('type', 'car');
        $motorcycles = Vehicle::all()->where('type', 'motorcycle');
        return view('welcome', compact('cars','motorcycles', 'vehicles'));
    }

    public function search_car(Request $req)
    {
        $cars = Vehicle::all()->where('type', 'car');
        $motorcycles = Vehicle::all()->where('type', 'motorcycle');
        $data = Vehicle::where('name', 'like', '%'.$req->input('query'). '%')
        ->orWhere('pickup_location', 'like', '%'.$req->input('query').'%')
        ->orWhere('drop_location', 'like', '%'.$req->input('query').'%')
        ->get();

        return view('visitors.search_car_result', ['cars' => $data, 'motorcycles' => $motorcycles]);
    }

    public function search_all(Request $req)
    {
        $cars = Vehicle::where('type', 'car')->get();
        $motorcycles = Vehicle::where('type', 'motorcycle')->get();
    
        $pickupLocation = $req->input('pickup_location');
    
        $data = Vehicle::where('pickup_location', 'like', '%' . $pickupLocation . '%')
            ->get();
    
        return view('visitors.search_all', ['cars' => $data, 'motorcycles' => $motorcycles]);
    }
    
    

}
