<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    use HasFactory;
    protected $table = 'users';

    protected $fillable = ['tipouser', 'nombre', 'apellidop', 'apellidom', 'curp', 'correo', 'correocon', 'telefono', 'institucionproced', 'formatosolicitud', 'areaconoc', 'subareaconoc', 'nivelsni', 'gradomax', 'lineainv', 'puesto', 'constancia', 'password', 'password_confirmation'];

        public function setPasswordAttribute($value)
        {
            $this->attributes['password'] = bcrypt($value);
            $this->attributes['password_confirmation'] = bcrypt($value);
        }
}
