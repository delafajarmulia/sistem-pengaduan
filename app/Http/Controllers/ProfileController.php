<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index($id)
    {
        $user = User::findOrFail($id);
        
        return view('profile', compact('user'));
    }

    public function edit(Request $request, string $id)
    {
        $request->validate(
            [
                'name'      =>'required|min:3|max:50',
                'email'     =>'required|min:3|max:100|unique:publics,email',
                'nik'       =>'unique:publics,nik|alpha_num:ascii|min:16|max:16',
                'no_hp'     =>'unique:publics,phone|alpha_num:ascii|min:10|max:13',
                // 'password'       =>'alpha_num:ascii|alpha:ascii'
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
                'no_hp'=>[
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
            'phone'=>$request->input('no_hp'),
            'password'=>bcrypt($request->input('password')),
            'role'=>'user'
        ];


        $nikDuplicate = User::where('nik', $data['nik']);
        if($nikDuplicate){
            return redirect()->route('registration')->with('failed', 'NIK Anda telah terdaftar');
        }

        $emailDuplicate = User::where('email', $data['email']);
        if($emailDuplicate){
            return redirect()->route('registration')->with('failed', 'Email Anda telah terdaftar');
        }

        User::create($data);
    }
}
