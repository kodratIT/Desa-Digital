<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelRt extends Model
{
    use HasFactory;
    public $table = "rukun_tetangga";
    public $guarded = ['id'];
}
