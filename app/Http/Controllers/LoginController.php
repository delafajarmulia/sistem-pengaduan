<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\PublicUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function actionLogin(Request $request){
        $credentials = $request->validate([
            'email'=>'required',
            'password'=>'required|min:3'
        ], [
            'email.required'=>'email wajib diisikan',
            'password.required'=>'password wajib diisikan',
            'password.min'=>'panjang password minimal 3 karakter'
        ]);

        $credentials = [
            'email'=>$request->email,
            'password'=>$request->password
        ];

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect('complaint');
        }else{
            return redirect()->route('login')->with('failed', 'Email dan Password Anda salah. Pastikan Anda telah menggunakan email dan password yang benar.');
        }
    }
}
