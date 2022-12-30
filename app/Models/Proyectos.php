<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Proyectos extends Model
{
    use HasFactory;
    protected $table = 'proyectos';
    use HasRoles; 

    protected $fillable = [
        'titulo',
        'numalumn',
        'tematica',
        'subtematica',
        'objectgeneral',
        'modalidad',
        'requisitos',
    ];

}
