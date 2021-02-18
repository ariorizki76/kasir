<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Waiter extends Authenticatable
{
    use Notifiable;

    protected $guard = 'waiter';

    protected $table = 'waiter';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama_waiter', 'username_waiter', 'email_waiter', 'password_waiter', 'password_waiter',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password_waiter', 'remember_token',
    ];
}
