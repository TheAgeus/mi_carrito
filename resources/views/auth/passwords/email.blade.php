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
        gap: 1rem;
    }
    @media(width < 600px){
        .form-control {
            flex-direction: column;
        }

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
    
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
    
        <div class="form-control">
            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
    
            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    
        <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="button">
                    {{ __('Send Password Reset Link') }}
                </button>
            </div>
        </div>
    </form>

</div>

@endsection
