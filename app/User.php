<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
class User extends Authenticatable
{
    use Notifiable,HasRoles;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table='users';
    protected $fillable = [
        'name', 'email', 'password','leave_balance','birthday','role','product','team','phone',
    ];
    function myevent()
    {
        return $this->hasMany('App\Event');
    }
    public function equipes()
    {
        return $this->belongsToMany('App\Equipe','equipe_user','user_id','equipe_id');
    }

    public function routeNotificationForMail($notification)
    {
        // Return email address only...
        return $this->email_address;

        // Return name and email address...
        return [$this->email_address => $this->name];
    }

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
}
