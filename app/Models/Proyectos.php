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
        'title',
        'studentnum',
        'thematic_id',
        'subthematic_id',
        'generalobject',
        'modality',
        'requirements',
        'keywords',
        'institution_id',
        'user_id',
    ];

}
