<?php

namespace App\Http\Controllers;

use App\Models\Spot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class WelcomeController extends Controller
{
    public function index()
    {
        try {
            // Logika untuk mengambil data
            $spots = Spot::limit(3)->get();
            return view('welcome', compact('spots')); // 
            // $data = /* logika untuk mendapatkan data */;
            // return view('home', compact('data'));
        } catch (\Exception $e) {
            log::error($e->getMessage());
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
}
