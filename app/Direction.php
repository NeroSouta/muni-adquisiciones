<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direction extends Model
{
    //
	protected $table = 'directions';

    protected $fillable = [
        'name',
    ];



//    public function user()
//    {
//        return $this->hasMany('App\User');
//    }

    public function configuration()
    {
        return $this->hasMany('App\Configuration');
    }

}
