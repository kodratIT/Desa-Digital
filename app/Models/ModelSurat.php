<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelSurat extends Model
{
    use HasFactory;
    public $table = "typeletter";
    public $guarded = ['id'];
}
