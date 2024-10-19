<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpotFormController extends Controller
{
    public function index(){
        return view('spotform');
    }
}
