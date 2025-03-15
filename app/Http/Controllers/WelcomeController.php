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
<<<<<<< HEAD
        $complaints = Complaint::limit(6)->with('user')->get();
=======
        // $complaints = Complaint::whereNotNull('image')->with('user')->get();
        $complaints = Complaint::limit(9)->with('user')->get();
>>>>>>> 834d70695216417817ca25d08d865a34dda4d003

        return view('welcome', compact(['spots', 'complaints']));
    }
}
