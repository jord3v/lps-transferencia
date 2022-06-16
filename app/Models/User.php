<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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


    public function landingPages()
    {
       return $this->hasMany(LandingPage::class);
    }

    public static function adminlte_image()
    {
        return 'https://ui-avatars.com/api/?name='.auth()->user()->name.'&background=0D8ABC&color=fff';
    }

    public static function adminlte_desc()
    {
        return 'That\'s a nice guy';
    }

    public static function adminlte_profile_url(){
        return route('profile');
    }
}
