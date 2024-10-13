<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        // $complaints = Complaint::withoutGlobalScopes()->with('responses')->get();


        // dd(DB::getQueryLog());
        $complaints = Complaint::with('responses')->get();
        // $complaints = Complaint::find(2);
        // $responses = $complaints->responses;
        dd($complaints);
        // return view('dashboard'); // , compact('complaints')

        // $complaints = Complaint::get();

        // foreach ($complaints as $complaint) {
        //     $responses = Response::where('complaint_id', $complaint->id)->get();
        //     dd($responses);  // Lihat apakah data response muncul dengan benar
        // }

        // $complaints = Complaint::all();
        // dd($complaints);

        // $responses = Response::all();
        // dd($responses);

        // $complaints = Complaint::with('responses')->get();
        // dd($complaints);

        // try {
        //     $complaints = Complaint::with('responses')->get();
        // } catch (\Illuminate\Database\QueryException $e) {
        //     dd($e->getMessage()); // Tampilkan pesan error
        // }
        
        // $complaints = DB::table('complaints')->with('responses')->get();
        // // $responses = DB::table('responses')->where('complaint_id', 2)->get();  // Ganti 1 dengan complaint ID yang valid
        // dd($complaints);

        // DB::enableQueryLog();  // Aktifkan query log sebelum query dijalankan

        // $complaints = Complaint::all();
        // $responses = Response::all();

        // dd($complaints, $responses);  // Lihat query log setelah query dijalankan


    }
}
