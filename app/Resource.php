<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    //
    protected $table = 'resources';

    protected $fillable = [
        'name', 'cod',
    ];


    public function configurations()
    {
        return $this->belongsToMany('App\Configuration')->withTimestamps();;
    }
}
