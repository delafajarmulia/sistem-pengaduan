<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PrintReportController extends Controller
{
    public function index()
    {
        $complaints = Complaint::with('responses')->with('user')->with('category')->with('spot')->with(['responses.user'])->latest()->get();
        $datetimeNow = Carbon::now()->setTimeZone('Asia/Jakarta')->format('d-m-Y H:i:s');
        $years = $complaints->pluck('created_at')->map(function($date){
            return Carbon::parse($date)->year;
        })->unique()->values();

        $message = 'Daftar seluruh pengaduan';

        return view('print-report', compact(['complaints', 'datetimeNow', 'years', 'message']));
    }

    public function filterReport(Request $request){
        Carbon::setLocale('id');

        $month = $request->input('month');
        $year = $request->input('year');
        $status = $request->input('status');
        $datetimeNow = Carbon::now()->setTimeZone('Asia/Jakarta')->format('d-m-Y H:i:s');

        $years = Complaint::pluck('created_at')->map(function($date){
            return Carbon::parse($date)->year;
        })->unique()->values();

        if(isset($month) && isset($year)){
            $month = (int)$month;
            $year = (int)$year;
        } else if(isset($month)){
            $month = (int)$month;
        } else if($year){
            $year = (int)$year;
        }

        if(isset($month) && isset($year) && isset($status)){
            $complaints = Complaint::whereMonth('date_of_complaint', $month)->whereYear('date_of_complaint', $year)->where('status', $status)->with('responses')->with('user')->with('category')->with('spot')->with(['responses.user'])->latest()->get();

            $monthName = Carbon::create()->month($month)->translatedFormat('F');
            $message = 'Diseleksi berdasarkan bulan ' . $monthName . ' dan status ' . $status;

            return view('print-report', compact(['complaints', 'datetimeNow', 'years', 'message']));
            $complaints = Complaint::whereMonth('date_of_complaint', $month)->with('responses')->with('user')->with('category')->with('spot')->with(['responses.user'])->latest()->get();
        } else if(isset($month) && isset($year)){
            $complaints = Complaint::whereMonth('date_of_complaint', $month)->whereYear('date_of_complaint', $year)->with('responses')->with('user')->with('category')->with('spot')->with(['responses.user'])->latest()->get();

            $monthName = Carbon::create()->month($month)->translatedFormat('F');
            $message = 'Diseleksi berdasarkan bulan ' . $monthName . ' dan tahun ' . $year;

            return view('print-report', compact(['complaints', 'datetimeNow', 'years', 'message']));
        } else if(isset($month) && isset($status)){
            $complaints = Complaint::whereMonth('date_of_complaint', $month)->where('status', $status)->with('responses')->with('user')->with('category')->with('spot')->with(['responses.user'])->latest()->get();

            $monthName = Carbon::create()->month($month)->translatedFormat('F');
            $message = 'Diseleksi berdasarkan bulan ' . $monthName . ' dan status ' . $status;

            return view('print-report', compact(['complaints', 'datetimeNow', 'years', 'message']));
        } else if(isset($year) && isset($status)){
            $complaints = Complaint::whereYear('date_of_complaint', $year)->where('status', $status)->with('responses')->with('user')->with('category')->with('spot')->with(['responses.user'])->latest()->get();

            $message = 'Diseleksi berdasarkan tahun ' . $year . ' dan status ' . $status;

            return view('print-report', compact(['complaints', 'datetimeNow', 'years', 'message']));
        } else if(isset($month)){
            $complaints = Complaint::whereMonth('date_of_complaint', $month)->with('responses')->with('user')->with('category')->with('spot')->with(['responses.user'])->latest()->get();

            $monthName = Carbon::create()->month($month)->translatedFormat('F');
            $message = 'Diseleksi berdasarkan bulan ' . $monthName ;

            return view('print-report', compact(['complaints', 'datetimeNow', 'years', 'message']));
        } else if(isset($year)){
            $complaints = Complaint::whereYear('date_of_complaint', $year)->with('responses')->with('user')->with('category')->with('spot')->with(['responses.user'])->latest()->get();

            $message = 'Diseleksi berdasarkan tahun ' . $year;

            return view('print-report', compact(['complaints', 'datetimeNow', 'years', 'message']));
        } else if (isset($status)){
            $complaints = Complaint::where('status', $status)->with('responses')->with('user')->with('category')->with('spot')->with(['responses.user'])->latest()->get();
            $message = 'Diseleksi berdasarkan status ' . $status;

            return view('print-report', compact(['complaints', 'datetimeNow', 'years', 'message']));
        }
    }
}
