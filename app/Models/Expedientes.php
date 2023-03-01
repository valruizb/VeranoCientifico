<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Expedientes extends Model
{
    use HasFactory;


    protected $table = 'records';

    protected $fillable = ['student_id', 'rev_id', 'status', 'comments'];
}