<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrintReportController extends Controller
{
    public function index()
    {
        return view('print-report');
    }
}
