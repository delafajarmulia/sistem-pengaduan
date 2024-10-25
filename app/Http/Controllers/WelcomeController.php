<?php

namespace App\Http\Controllers;

use App\Models\Spot;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $spots = Spot::limit(3)->get();
        return view('welcome', compact('spots')); // 
    }
}
