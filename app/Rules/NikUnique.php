<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\ModelFamily;
class NikUnique implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    protected $userId;
    protected $data;
    public function __construct($nik)
    {
        $data = ModelFamily::where('no_nik',$nik)->first();
        if($data != null){
            $this->userId = $data->user_id;
        }else{
            $this->data = $data;
        }

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
        if($this->userId != null){
            return false;
        }else{
            return ModelFamily::where('no_nik', $value)
            ->where(function ($query) {
                $query->where('user_id', $this->userId)
                ->orWhereNull('user_id');
            })
            ->first();
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        if($this->userId != null){
            return 'NIK sudah terdaftar.';
        }else{
            return 'NIK tidak terdaftar.';
        }
    }
}
