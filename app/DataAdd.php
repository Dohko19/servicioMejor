<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataAdd extends Model
{
	protected $fillable = ['user_id', 'rfc', 'cedula_profesional', 'certificacion', 'permisos_especiales', 'otro', 'business_image', 'tiempo_completo', 'servicios_externos', 'domicilio', 'atencion_inmediata'];
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
