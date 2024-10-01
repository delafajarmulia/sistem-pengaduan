<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\PublicUser;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function actionLogin(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required|min:3'
        ], [
            'email.required'=>'email wajib diisikan',
            'password.required'=>'password wajib diisikan',
            'password.min'=>'panjang password minimal 3 karakter'
        ]);

        $findUserLogin = Employee::where([
                                ['email', $request->email],
                                ['password', $request->password]])->get();
        
        if($findUserLogin){
            return redirect()->route('login')->with('success', $findUserLogin);
        } else {
            $findUserLogin = PublicUser::where([
                ['email', $request->email],
                ['password', $request->password]])->get();
            return redirect()->route('login')->with('success', $findUserLogin);
        }
    }
}
