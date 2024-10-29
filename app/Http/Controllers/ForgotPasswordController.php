<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function index($id)
    {
        return view('auth.forgot-password');
    }
}
