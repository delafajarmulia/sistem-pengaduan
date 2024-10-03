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
            // echo 'ok';
            $request->session()->regenerate();

            return redirect()->intended('/complaint');
        }else{
            echo 'gagal';
        }

        // if(Auth::attempt($credentials)){
        //     $request->session()->regenerate();
        //     return redirect()->intended('complaint');
        // }

        // $findUserLogin = Employee::where([
        //                         ['email', $request->email],
        //                         ['password', $request->password]])->get();
        
        // if($findUserLogin){
        //     if(Auth::attempt($credentials)){
        //         $request->session()->regenerate();
        //         return redirect()->intended('complaint');
        //     }
        //     // return redirect()->route('complaint')->with('success', $findUserLogin);
        // } else {
        //     $findUserLogin = PublicUser::where([
        //         ['email', $request->email],
        //         ['password', $request->password]])->get();
            
        //     if(Auth::attempt($credentials)){
        //         $request->session()->regenerate();
        //         return redirect()->intended('complaint');
        //     }
        //     // return redirect()->route('complaint')->with('success', $findUserLogin);
        // }
    }
}
