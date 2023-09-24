<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelKk extends Model
{
    use HasFactory;
    public $table = "card_family";
    public $fillable = ['no_kk','alamat_kk','id_rt','id_desa','id_rw'];
}
