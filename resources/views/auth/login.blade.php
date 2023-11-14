@extends('layouts.main-layout')

@section('content')

    <style>
        .login-form-container {
            display: flex;
            justify-content: center;
            height: 100vh;
            align-items: center;
        }
        .login-form-container form {
            width: 40%;
            height: 80%;
            display:flex;
            gap: 1rem;
            flex-direction: column;
            padding: 2rem;
            border: 5px solid rgba(0,0,0,0.1);
        }
        .login-form-container form .form-title {
            font-size: 2rem;
            font-weight: bold;
        }
        .login-form-container form input[type="text"], .login-form-container form input[type="password"] {
            all: unset;
            border: 1px solid rgba(0, 0, 146, 0.1);
            font-family: Arial, Helvetica, sans-serif;
            font-size: 0.8rem;
            padding-block: 1rem;
            padding-inline: 0.8rem;
            width: calc(100% - 1.6rem);
        }
        .login-form-container form input:focus {
            border: 1px solid rgba(0, 0, 146, 0.5);
        }
        .login-form-container form button {
            background-color: var(--nav-bg-color);
            color: white;
            border-radius: 20px;
            border: unset;
            padding: 0.8rem;
        }
        .login-form-container form button:hover{
            filter: brightness(120%);
            cursor: pointer; 
        }
        .form-control-input{
            width: 2rem;
        }
        @media (width < 700px) {
            .login-form-container form {
                width: 100%;
            }
        }
    </style>

    <div class="login-form-container">
        <form method="POST" action="{{ route('login') }}">
            <div class="form-title">
                Iniciar sesión
            </div>
            
            @csrf

            <div class="form-control">
                <div class="input-label">
                    Correo electrónico <span style="color:red;font-weight:bold;">*</span>
                </div>
                <input  type="text" placeholder="correo" name="email" id="email" value="{{old('email')}}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-control">
                <div class="input-label">
                    Contraseña <span style="color:red;font-weight:bold;">*</span>
                </div>
                <input  type="password" placeholder="contraseña" name="password" id="password" value="{{old('password')}}" required autocomplete="current-password">
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
