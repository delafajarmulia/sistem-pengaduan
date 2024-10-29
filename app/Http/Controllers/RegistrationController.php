<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function index(){
        return view('user.registration');
    }

    public function store(Request $request){
        $request->validate(
            [
                'name'      =>'required|min:3|max:50',
                'email'     =>'required|min:3|max:100|unique:users,email',
                'nik'       =>'unique:users,nik|alpha_num:ascii|min:16|max:16',
                'phone'     =>'alpha_num:ascii|min:10|max:13',
                'password'  =>'required|min:8|max:50'
            ],
            [
                'name'=>[
                    'required'  =>'Data nama harus diisikian',
                    'min'       =>'Nama minimal diisikan oleh :min karakter',
                    'max'       =>'Nama maksimal diisikan oleh :max karakter'
                ],
                'email'=>[
                    'required'  =>'Data email harus diisikian',
                    'min'       =>'Email minimal diisikan oleh :min karakter',
                    'max'       =>'Email maksimal diisikan oleh :max karakter',
                    'unique'    =>'Email sudah terdaftar'
                ],
                'nik'=>[
                    'required'  =>'Data nama harus diisikian',
                    'min'       =>'NIK minimal diisikan oleh :min karakter',
                    'max'       =>'NIK maksimal diisikan oleh :max karakter',
                    'unique'    =>'NIK sudah terdaftar',
                    'alpha_num' =>'NIK hanya boleh diisikan oleh angka'
                ],
                'phone'=>[
                    'required'  =>'Data nomor telepon harus diisikian',
                    'min'       =>'Nomor Telepon minimal diisikan oleh :min karakter',
                    'max'       =>'Nomor telepon maksimal diisikan oleh :max karakter',
                    'alpha_num' =>'NIK hanya boleh diisikan oleh angka'
                ],
                'password'=>[
                    'required'  =>'Data password harus diisikian',
                    'min'       =>'Password minimal diisikan oleh :min karakter',
                    'max'       =>'Password maksimal diisikan oleh :max karakter',
                ]
            ]
        );

        $data = [
            'name'=>$request->input('name'),
            'nik'=>$request->input('nik'),
            'email'=>$request->input('email'),
            'phone'=>$request->input('phone'),
            'password'=>bcrypt($request->input('password')),
            'role'=>'user'
        ];


        if (User::where('nik', $request->nik)->exists()) {
            return redirect()->route('registration')->withErrors(['nik' => 'NIK sudah terdaftar']);
        }

        if (User::where('email', $request->email)->exists()) {
            return redirect()->route('registration')->withErrors(['email' => 'Email sudah terdaftar']);
        }

        User::create($data);

        return redirect()->route('login');
    }
}
