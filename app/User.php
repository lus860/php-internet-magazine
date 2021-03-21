<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    const ADMIN = 1;
    const USER = 0;

    public static function checkAdmin($email, $password) {
        $user = self::getAdmin($email);
        if (!$user || !Hash::check($password, $user->password)) return false;
        return $user;
    }

    public static function getAdmin($email) {
        $admin = self::where('email', $email)->where('role', self::ADMIN)->first();
        if ($admin===null) return false;
        return $admin;
    }

    public static function getUsers(){
        return self::where('role', self::USER)->sort()->get();
    }


    public static function getUser($email) {
        return \App\Models\User::where(['email' => $email, 'role'=>self::USER])->first();
    }

    public function isAdmin() {
        return $this->role == self::ADMIN;
    }

    public function isUser() {
        return $this->role == self::USER;
    }




}
