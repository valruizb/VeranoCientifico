<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\subtematica;


//use Illuminate\Database\Eloquent\SoftDeletes;

class tematica extends Model
{
    use HasFactory;
    protected $table = 'thematics';

    protected $fillable = ['name'];

    public function subtematica(){
        return $this->hasMany(subtematica::class, 'thematic_id');
    }
}
