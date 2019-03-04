<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    //
    protected $table = 'configurations';

    protected $fillable = [
        'n_decreto', 'date', 'name','code_L', 'description_L', 'type_L', 'TipoConvocatoria', 'Moneda', 'Etapa', 'contract', 'EstadoPublicidadOfertas', 'EstimacionBase', 'FuenteFinanciamiento', 'MontoEstimado', 'EsRenovable', 'JustificaRenovacion', 'Observaciones', 'DuracionContrato', 'TiempoContrato', 'NombreResponsablePago', 'EmailResponsablePago', 'NombreResponsableContrato', 'EmailResponsableContrato', 'TelefonoResponsableContrato', 'ProhibicionSubcontrato', 'estado', '  Observaciones_Revision', 'user_id_creador', 'id_directions',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */


    public function user(){
    	return $this->belongsTo('App\User');/*->withTimestamps();;  se agregaba si era mucho a mucho*/
    }

    public function directions()
    {
        return $this->belongsTo('App\Direction');
    }

    public function resources()
    {
        return $this->hasMany('App\Resource');
    }

    public function standards()
    {
        return $this->hasMany('App\Standard');
    }

    
}
