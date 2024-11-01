<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PrintReportController extends Controller
{
    public function index()
    {
        $complaints = Complaint::with('responses')->with('user')->with('category')->with('spot')->with(['responses.user'])->latest()->get();
        $datetimeNow = Carbon::now()->setTimeZone('Asia/Jakarta')->format('d-m-Y H:i:s');
        return view('print-report', compact(['complaints', 'datetimeNow']));
    }
}
