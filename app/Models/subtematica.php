<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class subtematica extends Model
{
    use HasFactory;
    protected $table = 'subthematics';

    protected $fillable = ['name', 'thematic_id'];
    

}
