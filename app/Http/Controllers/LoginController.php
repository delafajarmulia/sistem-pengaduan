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
            'password'=>'required|min:8'
        ], [
            'email.required'=>'email wajib diisikan',
            'password.required'=>'password wajib diisikan',
            'password.min'=>'panjang password minimal :min karakter'
        ]);

        $credentials = [
            'email'=>$request->email,
            'password'=>$request->password
        ];

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect('dashboard');
        }else{
            return redirect()->route('login')->withErrors(['error' => 'Email atau Password Anda salah.']);
        }
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerate();

        return redirect('login');
    }
}
