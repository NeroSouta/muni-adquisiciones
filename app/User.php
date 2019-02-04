<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name', 'email', 'password','role', 'rut', 'cargo',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

        public function scopeName($query, $name)
    {
        if($name)
            return $query->where('name', 'LIKE', "%$name%");
    }
    public function scopeEmail($query, $email)
    {
        if($email)
            return $query->where('email', 'LIKE', "%$email%");
    }
    public function scopeRut($query, $rut)
    {
        if($rut)
            return $query->where('rut', 'LIKE', "%$rut%");
    }
}
