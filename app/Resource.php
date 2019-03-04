<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    //
    protected $table = 'resources';

    protected $fillable = [
        'name', 'unidad', 'cantidad', 'especificacionproducto', 'configuration_id',
    ];
           
    public function configurations()
    {
        return $this->belongsTo('App\Configuration');
    }
}
