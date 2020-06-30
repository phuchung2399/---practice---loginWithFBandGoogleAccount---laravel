<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Laravel\Socialite\Facades\Socialite;

use App\Models\User;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    function loginWithGoogle()
    {
        $user = new User();
        $google_user = Socialite::driver('google')->user();
        if (!$user->where('social_id', $google_user->id)->exists()) {
            $user->avatar =  $google_user->avatar;
            $user->name =  $google_user->name;
            $user->email =  $google_user->email;
            $user->social_id = $google_user->id;
            $user->save();
            return ('Đăng nhập thành công - chào: ' . $google_user->name);
        } else {
            return ('Đăng nhập thành công - chào: ' . $google_user->name);
        }
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    function loginWithFacebook()
    {
        $user = new User();
        $facebook_user = Socialite::driver('facebook')->user();
        if (!$user->where('social_id',  $facebook_user->id)->exists()) {
            $user->avatar =   $facebook_user->avatar;
            $user->name =   $facebook_user->name;
            $user->email =   $facebook_user->email;
            $user->social_id =  $facebook_user->id;
            $user->save();
            return ('Đăng nhập thành công - chào: ' .  $facebook_user->name);
        } else {
            return ('Đăng nhập thành công - chào: ' .  $facebook_user->name);
        }
    }
}
