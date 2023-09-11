<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\ModelKk;

class NokkNotRegistered implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
         return  ModelKk::where('no_kk', $value)->exists();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Nomor KK belum terdaftar.';
    }
}
