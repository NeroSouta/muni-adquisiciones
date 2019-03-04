<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Standard extends Model
{
    protected $table = 'standards';

    protected $fillable = [
        'name', 'porcentaje' , 'description',
    ];

     public function configurations()
    {
        return $this->belongsTo('App\Configuration');
    }
}
