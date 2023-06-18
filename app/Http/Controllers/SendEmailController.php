<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\SendMailJob;
use Yajra\DataTables\Facades\Datatables;

class SendEmailController extends Controller
{

    public function index()
    {
        return view('kirim-email');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        dispatch(new SendMailJob($data));
        return redirect()->route('kirim-email')->with('status', 'Email berhasil dikirim');
    }
    
}
