<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Spot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class WelcomeController extends Controller
{
    public function index()
    {
        $spots = Spot::limit(6)->get();
        // $complaints = Complaint::whereNotNull('image')->with('user')->get();
        $complaints = Complaint::limit(9)->with('user')->get();

        return view('welcome', compact(['spots', 'complaints']));
    }
}
