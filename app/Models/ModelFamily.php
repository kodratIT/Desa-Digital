<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelFamily extends Model
{
    use HasFactory;
    public $table = "members_card_family";
    public $guarded = ['id'];  
}
