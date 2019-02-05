<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    //
    protected $table = 'configurations';

    protected $fillable = [
        'n_decreto', 'date', 'name','code_L', 'description_L', 'type_L', 'TipoConvocatoria', 'Moneda', 'Etapa', 'contract', 'EstadoPublicidadOfertas', 'EstimacionBase', 'FuenteFinanciamiento', 'MontoEstimado', 'EsRenovable', 'JustificaRenovacion', 'Observaciones', 'DuracionContrato', 'TiempoContrato', 'NombreResponsablePago', 'EmailResponsablePago', 'NombreResponsableContrato', 'EmailResponsableContrato', 'TelefonoResponsableContrato', 'ProhibicionSubcontrato', 'estado', 'user_id_editor', 'user_id_creador',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */


    public function user(){
    	$this->belongsTo('App\User');
    }

    public function resources()
    {
        return $this->belongsToMany('App\Resource')->withTimestamps();;
    }

    public function standards()
    {
        return $this->belongsToMany('App\Standard')->withTimestamps();;
    }
}
