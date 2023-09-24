<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\ModelKk;

class NokkNotRegistered implements Rule
{
    protected $nokk;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($nik,$nokk)
    {
        $data = ModelKk::where('card_family.no_kk',$nokk)
        ->join('members_card_family','members_card_family.no_kk','=','card_family.id')
        ->where('members_card_family.no_nik',$nik)
        ->first();

        $this->nokk = $data;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
         // Cek apakah nomor KK sudah terdaftar dalam database
         if($this->nokk != null){
            return true;
         }else{
            return false;
         }
         
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'NO KK Tidak Ditemukan.';
    }
}
