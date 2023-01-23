<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subtematicas;
use Illuminate\Database\Eloquent\SoftDeletes;


//use Illuminate\Database\Eloquent\SoftDeletes;

class Tematicas extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'thematics';

    protected $fillable = ['name'];

    public function subtematica(){
        return $this->hasMany(Subtematicas::class, 'thematic_id');
    }

    
}