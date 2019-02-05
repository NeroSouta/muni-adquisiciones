<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direction extends Model
{
    //
	protected $table = 'directions';

    protected $fillable = [
        'id_configuration', 'name',
    ];



    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
