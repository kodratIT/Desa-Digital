@extends('layouts.app')
@section('content')
<form action="{{ route('register') }}" method="POST">
    @csrf
    <h1>Registration</h1>
    <div class="input-box mb-2">
        <input type="email" placeholder="Email" name="email" required class="@error('email') is-invalid @enderror" value="{{ old('email') }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
        </svg>
        
    </div>
    @error('email')
        <strong class="text-danger">Email sudah digunakan.</strong>
    @enderror

    <div class="input-box mt-3 mb-2">
        <input type="text" placeholder="NIK" name="nik" required class="@error('nik') is-invalid @enderror" value="{{ old('nik') }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
        </svg>
    </div>
         @error('nik')
         <strong class="text-danger">{{ $message }}</strong>
         @enderror
    <div class="input-box mt-3 mb-2">
             <input type="text" placeholder="NO KK" name="no_kk" required class="@error('no_kk') is-invalid @enderror" value="{{ old('no_kk') }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
        </svg>
    </div>
    @error('no_kk')
        <strong class="text-danger">{{ $message }}</strong>
    @enderror

    <div class="input-box mt-3 mb-2">
        <span class="password-container">
        <input type="password" placeholder="Password" id="password" required name="password">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
            <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
          </svg>
        <img src="{{ asset('assets/img/eye-close.png') }}" id="eyeicon" class="eye-icon">
        </span> 
    </div>
    <div class="input-box mt-3 mb-2">
        <span class="password-container">
        <input type="password" placeholder="Password Konfirmasi" id="password-c" required name="password_confirmation">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
            <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
        </svg>
        <img src="{{ asset('assets/img/eye-close.png') }}" id="eyeicon" class="eye-icon">
    </span> 
    </div>
    @error('password')
        <strong class="text-danger">{{ $message }}</strong>
    @enderror

    <div class="remember-forgot mt-3">
        <label><input type="checkbox" name="agree" required> I agree to the terms & conditions</label>
    </div>

    <button type="submit" class="btn btn-primary">Register</button>

    <div class="register-link">
        <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>   
    </div>
</form>
@endsection
