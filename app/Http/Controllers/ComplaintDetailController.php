<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Response;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComplaintDetailController extends Controller
{
    public function index($id){
        $complaint = Complaint::with('responses')->with('user')->with('category')->with(['responses.user'])->find($id);
        
        return view('complaintDetail', compact('complaint'));
    }

    public function addResponse(Request $request, string $id){
        $request->validate([
            'response'  => 'required|min:3'
        ],[
            'required'  => 'Tidak ada tanggapan yang Anda kirim',
            'min'       => 'Tanggapan yang baik minimal :min karakter'
        ]);

        $data = [
            'user_id'           => Auth::user()->id,
            'complaint_id'      => $id,
            'content'           => $request->input('response'),
            'date_of_response'  => Carbon::now() 
        ];

        Response::create($data);

        $complaint = Complaint::with('responses')->with('user')->with('category')->with(['responses.user'])->find($id);
        
        return view('complaintDetail', compact('complaint'));
    }
}
