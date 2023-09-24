@extends('layouts.app')

@section('content')
<form action="{{ route('login') }}" method="POST">
    @csrf
    <h1>Login</h1>
    
    @error('email')
    <span class="text-center p-0">
        <p class="text-danger text-center fw-bold ">Email/Password Salah</p>
    </span>
    @enderror
    <div class="input-box">
        <input type="email" placeholder="Email" name="email" required>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
        </svg>
    </div> 
    <div class="input-box">
        <span class="password-container">
        <input type="password" placeholder="Password" id="password" name="password" required>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
            <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
          </svg>
        <img src="{{ asset('assets/img/eye-close.png') }}" id="eyeicon" class="eye-icon">
        </span> 
    </div>

    <div class="remember-forgot">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

            <label class="form-check-label" for="remember">
                {{ __('Remember Me') }}
            </label>
        </div>
        <a href="#">Forgot Password?</a>
    </div>

    <button type="submit" class="btn btn-primary">Sign in</button>

    <div class="register-link">
        <p>Don't have an account? <a href="{{ route('register') }}">Register</a></p>   
    </div>
</form>
@endsection
