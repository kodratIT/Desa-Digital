<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelDesa extends Model
{
    use HasFactory;
    public $table = "vilages";
    public $fillable = ['id','name_desa'];   
}
