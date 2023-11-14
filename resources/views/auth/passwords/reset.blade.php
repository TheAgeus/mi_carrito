@extends('layouts.main-layout')

@section('content')


<style>
    .full-container {
        width: 100%;
        height: 50vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    .full-container form {
        border: 10px solid rgba(0,0,0,0.1);
        display: flex;
        flex-direction: column;
        gap: 1rem;
        padding: 1rem;
    }
    .form-control {
        display: flex;
        flex-direction: column;
    }
    .button:hover {
        cursor: pointer;
    }
    .button {
        background-color: black;
        color: white;
    }
</style>


<div class="full-container">
    <form method="POST" action="{{ route('password.update') }}">
        @csrf
    
        <input type="hidden" name="token" value="{{ $token }}">
    
        <div class="row mb-3">
            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
    
            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
    
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    
        <div class="form-control">
            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
    
            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    
        <div class="form-control">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
    
            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>
    
                <button type="submit" class="button">
                    {{ __('Reset Password') }}
                </button>

    </form>
</div>


@endsection
