<?php

namespace App\Models;

use App\Http\Helpers\Mailer;
use App\Traits\validationTrait;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Laravel\Sanctum\HasApiTokens;
use PhpParser\Node\Expr\FuncCall;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable,validationTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function upsertInstance($data)
    {
        $user = self::getUserBelongToEmail($data->email);

        if($user) {

            if( ! $user->password ) {
                $user->password = Hash::make(Str::random(60));
            }

            if( ! $user->emai_verified_at ) {
                $user->email_verified_at = Carbon::now();
                $user->save();
            }
           
        } else {
            $user = self::createInstance($data,['password' => Str::random(60),'email_verified_at' => Carbon::now() ]);
        }

        Auth::loginUsingId($user->id);
    }

    public function modifyInstance($data)
    {
        $this->update($data->except(['password','email']));
        return self::validateResult('success',[$data]);
    }

    public function assignImagePreview($data)
    {
        $dimintionsArray = [
            'medium' => '400X400',
            'small'  => '200X200'
        ];

        Image::storePreview($data->main_image,$dimintionsArray,Auth::user());
    }

    public function createInstance($data,$additional = [3]) 
    {
        $user = self::firstOrCreate(
            ['email' => $data->email],
            [
                'email' => $data->email,
                'phone' => $data->phone ?? null,
                'name'  => $data->name,
                'password' => $additional['password'] ?? null,
                'email_verified_at' => $additional['email_verified_at'] ?? null
            ]
        );

        return $user;
    }

    public function sendPasswordResetNotification($token)
    {
        Mailer::forgetPassword($this,$token);

        return redirect('/login');
    }


    public function sendEmailVerificationNotification()
    {
        $token =  Str::random(60);
        $hashToken = Hash::make($token);
        
        DB::table('password_resets')->updateOrInsert(
        ['email' => $this->email],
        [
            'email' => $this->email,
            'token' => $hashToken,
            'created_at' => Carbon::now()
        ]);

        Mailer::verifyUser($this,$token);
    }

    public function getUserBelongToEmail($email) 
    {

        $user = self::where('email',$email)->first();
        return $user;
    }

    public function isAdmin()
    {
        if($this->role_id == ADMIN || $this->role_id == SUPERADMIN) {
            return true;
        } else {
            return false;
        }
    }

    public function isSuperAdmin()
    {
        if($this->role_id == SUPERADMIN) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteInstance()
    {
        $this->delete();
        return self::validateResult('success',$this);
    }
}
