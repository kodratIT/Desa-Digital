<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Rules\NokkNotRegistered;
use App\Rules\NikUnique;
use App\Models\ModelKk;
use App\Models\ModelFamily;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'nik' => ['required', 'string', 'max:16', new NikUnique($data['nik'])],
            'no_kk' => ['required', 'string', 'max:16', new NokkNotRegistered($data['nik'],$data['no_kk'])],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'agree' => ['required', 'accepted'], // Validasi untuk persetujuan
        ], [
            'agree.required' => 'Anda harus menyetujui persyaratan dan ketentuan.',
            'agree.accepted' => 'Anda harus menyetujui persyaratan dan ketentuan.',
        ]);
        
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {   
        
        $user = User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ])->assignRole('user');
            
        $data   = ModelFamily::where('no_nik',$data['nik'])->first();
            
        $data->update([
            'user_id'   => $user->id
        ]);
        
        return $user;
    }
}
