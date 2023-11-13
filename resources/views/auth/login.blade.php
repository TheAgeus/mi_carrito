@extends('layouts.main-layout')

@section('content')

    <style>
        .login-form-container {
            display: flex;
            justify-content: center;
            height: 50vh;
            align-items: center;
        }
        .login-form-container form {
            display:flex;
            gap: 1rem;
            flex-direction: column;
            padding: 2rem;
            border: 1px solid rgba(0,0,0,0.2);
        }
        .login-form-control {
            display: flex;

        }
    </style>

    <div class="login-form-container">
        <form method="POST" action="{{ route('login') }}">
            <div class="form-title">
                Iniciar sesión
            </div>
            
            @csrf

            <div class="login-form-control">
                <input type="text" placeholder="correo" name="email" id="email" value="{{old('email')}}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="login-form-control">
                <input type="password" placeholder="contraseña" name="password" id="password" value="{{old('password')}}" required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>


            <div class="login-form-control">
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember">
                    Recuérdame
                </label>
            </div>

            <button type="submit">
                Ingresar
            </button>

            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    ¿Olvidaste tu contraseña?
                </a>
            @endif

        </form>
    </div>

@endsection
