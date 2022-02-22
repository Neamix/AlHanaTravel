<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    public function index()
    {
        return view('front.index');
    }

    public function search()
    {
        return view('front.pages.search')->with('hotels',Hotel::orderBy('id','DESC')->paginate(6));
    }

    public function resendVerify()
    {
        Auth::user()->sendEmailVerificationNotification();
        return redirect()->route('verify.account');
    }

    public function verify()
    {
        return view('auth.verify');
    }
}
