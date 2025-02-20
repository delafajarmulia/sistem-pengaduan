<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Notification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        if(Auth::user()->role === 'admin'){
            $complaints = Complaint::with('responses')->with('user')->with('category')->with('spot')->with(['responses.user'])->latest()->get();
            $notificationCount = Notification::where('user_away_id', Auth::id())->count();
            return view('dashboard', compact(['complaints', 'notificationCount'])); 
        } else {
            $complaints = Complaint::where('user_id', Auth::id())->with('responses')->with('user')->with('category')->with('spot')->with(['responses.user'])->latest()->get();
            $notificationCount = Notification::where('user_away_id', Auth::id())->count();
            return view('dashboard', compact(['complaints', 'notificationCount'])); 
        }
    }

    public function editStatus($id)
    {
        $userAwayId = request()->query('user_away_id');
        
        $complaint = Complaint::where('id', $id)->where('user_id', $userAwayId)->firstOrFail();
        $complaint->status = $complaint->status === 'proses' ? 'selesai' : 'proses';
        $complaint->save();

        $data = [
            'user_home_id'          => Auth::id(),
            'user_away_id'          => $userAwayId,
            'complaint_id'          => $id,
            'category'              => 'change_status',
            'message'               => Auth::user()->name .' telah mengubah status laporan Anda',
            'date_of_notification'  => Carbon::now()->setTimeZone('Asia/Jakarta')->format('Y-m-d H:i:s'),
        ];

        Notification::create($data);
        
        return redirect()->route('dashboard')->with('success', 'Berhasil mengubah status');
    }
}
