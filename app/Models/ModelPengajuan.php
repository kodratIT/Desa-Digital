<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelPengajuan extends Model
{
    use HasFactory;
    public $table = "pengajuan_surat";
    public $guarded = ['id'];
}
