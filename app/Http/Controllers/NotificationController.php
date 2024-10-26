<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index($id)
    {
        $notifications = Notification::where('user_away_id', $id)->get();
        return view('notification', compact('notifications'));
    }
}
