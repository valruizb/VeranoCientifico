<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class tematica extends Model
{
    use HasFactory;
    protected $table = 'tematica';

    protected $fillable = ['name'];
}
