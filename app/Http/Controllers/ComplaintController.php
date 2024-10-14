<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Complaint;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();

        return view('complaintform', compact(['categories']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'isi_pengaduan' => 'required|min:5'
        ],[
            'isi_pengaduan.required'    => 'Harap isikan aduan Anda',
            'isi_pengaduan.min'         => 'Minimal karakter adalah 5'
        ]);
        
        $data = [
            'category_id'       => $request->input('category'),
            'user_id'           => Auth::user()->id,
            'content'           => $request->input('isi_pengaduan'),
            'date_of_complaint' => Carbon::now()->format('Y-m-d H:i:s'),
            'status'            => 'proses'
        ];

        Complaint::create($data);
        return redirect()->route('dashboard')->with('success', 'Terima kasih telah membuat laporan. Laporan Anda secepatnya akan kami proses');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
