<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Notification;
use App\Models\Response;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComplaintDetailController extends Controller
{
    public function index($id){
        $complaint = Complaint::with('responses')->with('user')->with('category')->with('spot')->with(['responses.user'])->find($id);
        
        return view('complaint.complaint-detail', compact('complaint'));
    }

    public function addResponse(Request $request, string $id){
        $request->validate(
            [
                'response'  => 'required|min:3'
            ],
            [
                'required'  => 'Tidak ada tanggapan yang Anda kirim',
                'min'       => 'Tanggapan yang baik minimal :min karakter'
            ]
        );

        $data = [
            'user_id'           => Auth::id(),
            'complaint_id'      => $id,
            'content'           => $request->input('response'),
            'date_of_response'  => Carbon::now()->setTimeZone('Asia/Jakarta')->format('Y-m-d H:i:s')
        ];

        Response::create($data);

        $complaintDetail = Complaint::where('id', $id)->firstOrFail();
        $responderName = Auth::user()->role === 'admin' ? Auth::user()->name : censorName(Auth::user()->name);

        $notificationData = [
            'user_home_id'          => Auth::id(),
            'user_away_id'          => $complaintDetail->user_id,
            'complaint_id'          => $id,
            'category'              => 'add_response',
            'message'               => $responderName .' menambahkan komentar pada laporan Anda.',
            'date_of_notification'  => Carbon::now()->setTimezone('Asia/Jakarta')->format('Y-m-d H:i:s')
        ];

        Notification::create($notificationData);

        $complaint = Complaint::with('responses')->with('user')->with('category')->with(['responses.user'])->find($id);
        
        return view('complaint.complaint-detail', compact('complaint'));
    }
}
