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
            Log::info('Entering index method'); // Tambahkan log ini
            $spots = Spot::limit(3)->get();
            Log::info('Fetched spots: ', $spots->toArray()); // Tambahkan log ini
            return view('welcome', compact('spots'));
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
}
