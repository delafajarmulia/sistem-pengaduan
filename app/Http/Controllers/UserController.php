<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // lihat semua pengguna (hanya admin)
    public function index()
    {
        $users = User::all();
        $userSum = User::count();

        return view('user.user-list', compact('users', 'userSum'));
    }

    // lihat detail pengguna
    public function userDetail($id)
    {
        $user = User::find($id);

        if(!$user){
            return view('user.profile')->with('error', 'Data pengguna tidak ditemukan');
        }
        
        return view('user.profile', compact('user'));
    }

    // edit data pengguna
    public function edit(Request $request, string $id)
    {
        $user = User::find($id);

        if(!$user){
            return redirect()->route('profile', ['id' => $id])->withErrors(['error' => 'Data pengguna tidak ditemukan']);
        }

        $request->validate(
            [
                'name'      => 'required|min:3|max:50',
                'email'     => 'required|min:3|max:100|unique:users,email,' . $user->id,
                'nik'       => 'unique:users,nik,' . $user->id . '|alpha_num:ascii|min:16|max:16',
                'phone'     => '|alpha_num:ascii|min:10|max:13'
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
                ]
            ]
        );

        $user->name = $request->name;
        $user->email = $user->email;
        $user->nik = $user->nik;
        $user->password = $user->password;
        $user->role = $user->role;
        $user->phone = $request->phone;

        // Cek apakah password dan confirm_password diisi
        if ($request->filled('password') || $request->filled('confirm_password')) {
            // Validasi hanya jika salah satu terisi
            $request->validate([
                'password'          => 'nullable|min:8|max:50',
                'confirm_password'  => 'required_with:password|same:password|min:8|max:50',
            ], [
                'confirm_password.same'         => 'Konfirmasi password harus sama dengan password',
                'confirm_password.required_with' => 'Konfirmasi password harus diisi jika password diisi',
            ]);

            if ($request->filled('password')) {
                $user->password = bcrypt($request->password);
            }
        }

        // Cek dan update NIK dan Email jika ada perubahan
        if ($request->nik !== $user->nik) {
            if (User::where('nik', $request->nik)->exists()) {
                return redirect()->route('profile', ['id' => $user->id])->withErrors(['nik' => 'NIK sudah terdaftar']);
            }
            $user->nik = $request->nik;
        }

        if ($request->email !== $user->email) {
            if (User::where('email', $request->email)->exists()) {
                return redirect()->route('profile', ['id' => $user->id])->withErrors(['email' => 'Email sudah terdaftar']);
            }
            $user->email = $request->email;
        }

        $user->save();

        return redirect()->route('profile', ['id'=>$user->id])->with('success', 'Berhasil mengubah data');
    }

    public function showUserAdd()
    {
        return view('user.add-user');
    }

    public function addUser(Request $request){
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
            'role'=>$request->input('role')
        ];


        if (User::where('nik', $request->nik)->exists()) {
            return redirect()->route('registration')->withErrors(['nik' => 'NIK sudah terdaftar']);
        }

        if (User::where('email', $request->email)->exists()) {
            return redirect()->route('registration')->withErrors(['email' => 'Email sudah terdaftar']);
        }

        User::create($data);

        return redirect()->route('dashboard')->with('success', 'Berhasil menambahkan pengguna baru.');
    }
}
