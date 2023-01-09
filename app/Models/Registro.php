<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;


class Registro extends Model
{
    use HasFactory;
    protected $table = 'users';
    use HasRoles; 

    protected $fillable = [
        'tipouser', 
        'nombre', 
        'apellidop', 
        'apellidom', 
        'curp', 
        'correo', 
        'correocon', 
        'telefono', 
        'institution_id', 
        'formatosolicitud', 
        'thematic_id', 
        'subthematic_id', 
        'nivelsni', 
        'gradomax', 
        'lineainv', 
        'puesto', 
        'constancia', 
        'password', 
    ];

        public function setPasswordAttribute($value)
        {
            $this->attributes['password'] = bcrypt($value);
        }
}
