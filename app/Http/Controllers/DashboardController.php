<?php

namespace App\Http\Controllers;

use App\Models\Complaint;

class DashboardController extends Controller
{
    public function index(){
        $complaints = Complaint::with('responses')->with('user')->with('category')->with(['responses.user'])->get();
        return view('dashboard', compact('complaints')); 
    }

    public function editStatus($id){
        $complaint = Complaint::findOrFail($id);
        $complaint->status = $complaint->status === 'proses' ? 'selesai' : 'proses';
        $complaint->save();
        
        return redirect()->route('dashboard')->with('success', 'Berhasil mengubah status');
    }
}
