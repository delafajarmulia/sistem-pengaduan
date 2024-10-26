<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Notification;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $complaints = Complaint::with('responses')->with('user')->with('category')->with('spot')->with(['responses.user'])->latest()->get();
        return view('dashboard', compact('complaints')); 
    }

    public function editStatus($id)
    {
        $userAwayId = request()->query('user_away_id');
        
        $complaint = Complaint::findOrFail($id);
        $complaint->status = $complaint->status === 'proses' ? 'selesai' : 'proses';
        $complaint->save();

        $data = [
            'user_home_id'  => Auth::user()->id,
            'user_away_id'  => $userAwayId,
            'complaint_id'  => $id,
            'message'       => 'Admin telah mengubah status laporan Anda'
        ];

        Notification::create($data);
        
        return redirect()->route('dashboard')->with('success', 'Berhasil mengubah status');
    }
}
