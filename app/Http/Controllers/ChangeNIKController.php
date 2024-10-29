<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChangeNIKController extends Controller
{
    public function requestChangeNIK($id)
    {
        return view('change-nik.request-change-nik');
    }

    public function changeNIK(Request $request, $id)
    {
        $user = User::find($id);
        $admins = User::where('role', 'admin')->get();
        
        $request->validate(
            [
                'nik'           => 'unique:users,nik,'. $user->id .'|alpha_num:ascii|min:16|max:16'
            ],
            [
                'nik.unique'    => 'Maaf data NIK telah tersedia. Silakan cek kembali.',
                'nik.alpha_num' => 'Data NIK hanya boleh berisikan angka.',
                'nik.min'       => 'NIK minimal diisikan oleh :min karakter',
                'nik.max'       => 'NIK maksimal diisikan oleh :max karakter',
            ]
        );

        $userCensorName = censorName($user->name);

        foreach($admins as $admin){
            $notificationData = [
                'user_home_id'          => Auth::id(),
                'user_away_id'          => $admin->id,
                'complaint_id'          => null,
                'category'              => 'change_nik',
                'message'               => $userCensorName .' mengirimkan permintaan perubahan NIK menjadi '. $request->nik,
                'date_of_notification'  => Carbon::now()->setTimeZone('Asia/Jakarta')->format('Y-m-d H:i:s'),
            ];

            Notification::create($notificationData);
        }

        return redirect()->route('dashboard')->with('success', 'Berhasil mengirimkan permintaan perubahan NIK. Mohon bersabar menunggu Admin merubah NIK Anda.');
    }

    public function changeNIKForm($id)
    {
        $notif = Notification::find($id);

        $userRequest = $notif->user_home_id;
        $nikRequest = $notif->message;

        $messageArray = explode(' ', $nikRequest);
        $nikChanged = end($messageArray);

        return view('change-nik.change-nik-form', compact(['userRequest', 'nikChanged']));
    }

    public function editNIK(Request $request, $id)
    {
        $user = User::find($id);

        $request->validate(
            [
                'nik'           => 'unique:users,nik,'. $user->id .'|alpha_num:ascii|min:16|max:16'
            ],
            [
                'nik.unique'    => 'Maaf data NIK telah tersedia. Silakan cek kembali.',
                'nik.alpha_num' => 'Data NIK hanya boleh berisikan angka.',
                'nik.min'       => 'NIK minimal diisikan oleh :min karakter',
                'nik.max'       => 'NIK maksimal diisikan oleh :max karakter',
            ]
        );
        
        $user->nik = $request->nik;
        $user->save();

        $admin = User::find(Auth::id());
        $adminName = $admin->name;

        $data = [
            'user_home_id'          => Auth::id(),
            'user_away_id'          => $user->id,
            'complaint_id'          => null,
            'category'              => 'change_nik',
            'message'               => $adminName .' telah mengubah NIK Anda',
            'date_of_notification'  => Carbon::now()->setTimeZone('Asia/Jakarta')->format('Y-m-d H:i:s'),
        ];

        Notification::create($data);

        return redirect()->route('dashboard')->with('success', 'Berhasil mengubah NIK');
    }
}
