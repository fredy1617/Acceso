<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';

    protected $fillable = [
        'Nombre','Apellidos', 'email', 'password','Rol','Foto','Plantel', 
    ];

    protected $hidden = [
        'Nombre','Apellidos', 'email', 'password','Rol','Foto','Plantel', 
    ];
}
