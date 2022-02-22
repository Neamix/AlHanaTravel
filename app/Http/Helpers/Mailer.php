<?php 

namespace App\Http\Helpers;

use App\Mail\DefaultEmail;
use Illuminate\Support\Facades\Mail;

class Mailer {
    static function verifyUser($user,$token) {
        $send['title'] = 'Verify Account';
        $send['desc']  = 'مرحبا بك في الهنا ترافيل لاستكمال بينات حسابك برجاء الضغط علي الزر الذي بالاسفل';
        $send['title'] = 'تفعيل حساب';
        $send['email'] = $user->email;
        $send['name']  = $user->name;
        $send['token'] = $token;
        $send['view']  = 'emails.user.verify';
        $send['url']   = "$token?email=$user->email";
        self::sendEmail($send);
    }

    static function forgetPassword($user,$token) {
        $send['title'] = 'اعاده تعيين كلمة السر';
        $send['email'] = $user->email;
        $send['desc']  = 'لاعاده تعيين كلمة المرور الخاصه بك الرجاء الضغط علي الزر الذي بلاسفل';
        $send['name']  = $user->name;
        $send['token'] = $token;
        $send['url']   = "$token?email=$user->email";
        $send['view']  = 'emails.user.verify';
        self::sendEmail($send);
    }

    static function sendEmail($data) {
        Mail::to($data['email'])->queue(new DefaultEmail($data));
    }
}