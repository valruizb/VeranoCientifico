<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class calendario_convocatoria extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'c_calendario';

    protected $fillable = ['id','id_convocatoria', 'id_evento', 'fec_inicio', 'fec_fin','comentario'];

    public function convocatorias()
    {
        return $this->hasOne(convocatoria::class, 'id', 'id_convocatoria');
    }

    public function Eventos()
    {
        return $this->hasOne(evento::class, 'id', 'id_evento');
    }
}
