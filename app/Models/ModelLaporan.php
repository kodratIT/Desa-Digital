<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ModelFamily;

class ModelLaporan extends Model
{
    use HasFactory;
    public $table = "laporan_warga";
    public $guarded = ['id'];

    public function membersCardFamily()
    {
        return $this->belongsTo(ModelFamily::class, 'user_id', 'id_user');
    }
}
