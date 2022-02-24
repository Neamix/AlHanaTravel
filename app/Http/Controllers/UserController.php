<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserProfileRequest;
use App\Models\Hotel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;


class UserController extends Controller
{
    public function socialite($drive)
    {
        return Socialite::driver($drive)->redirect();
    }

    public function socialRedirect($drive)
    {
        $user = Socialite::driver($drive)->user();
        User::upsertInstance($user);

        return redirect('/');
    }

    public function profile()
    {
        return view('front.users.profile');
    }

    public function updatePersonalInfo(UserProfileRequest $request)
    {
        return Auth::user()->modifyInstance($request);
    }

    public function likeHotel(Hotel $hotel)
    {
        if(Auth::check()) {
            Auth::user()->toggleThisHotelLike($hotel->id);
        }
    }

    public function deleteInstance(User $user)
    {
        return $user->deleteInstance();
    }
}
