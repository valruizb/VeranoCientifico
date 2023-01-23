<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Subtematicas extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'subthematics';

    protected $fillable = ['name', 'thematic_id'];




}

