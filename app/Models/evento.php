<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class evento extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'c_evento';

    protected $fillable = ['nombre'];
}
