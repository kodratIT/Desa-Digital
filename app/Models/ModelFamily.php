<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ModelLaporan;
use App\Models\User;

class ModelFamily extends Model
{
    use HasFactory;
    public $table = "members_card_family";
    public $guarded = ['id'];  

    public function modelLaporan()
    {
        return $this->hasOne(ModelLaporan::class, 'id_user', 'user_id');
    }

    public function UserFamily(){
        return $this->belongsTo(User::class, 'id', 'user_id');
    }
}
