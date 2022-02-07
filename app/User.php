<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
	protected $table = "users";
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'phone', 'password' 
    ];

    protected $attributes = [
		'phone' => 0 ,
        'status' => 1 ,
		'role' => 2 
    ];
	
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

}
