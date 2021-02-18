<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Kasir extends Authenticatable
{
    use Notifiable;

    protected $guard = 'kasir';

    protected $table = 'kasir';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama_kasir', 'username_kasir', 'email_kasir', 'password_kasir', 'password_kasir',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password_kasir', 'remember_token',
    ];
}
