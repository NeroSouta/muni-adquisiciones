<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Standard extends Model
{
    protected $table = 'standards';

    protected $fillable = [
        'name', 'description', 'text',
    ];

     public function configurations()
    {
        return $this->belongsToMany('App\Configuration')->withTimestamps();;
    }
}
