@extends('layouts.main-layout')

@section('content')

<style>
    .card {
        border: 10px solid rgba(0,0,0,0.1);
        background-color: rgba(255,0,0,0.1);
        width: 60%;
    }
    .full-container {
        height: 50vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .card-title {
        font-weight: bold;
        font-size: 1.2rem;
        padding: 1rem;
    }
    .card-body {
        padding: 1rem;
    }
    .boton:hover {
        cursor: pointer;
    }
    .boton{
        background-color: black;
        color: white;
        padding: 0.2rem;
        margin-block: 0.2rem;
        border: unset;
    }
    @media(width < 600px) {
        .card {
            width: 90%;
        }
    }
</style>

<div class="full-container">
    <div class="card">
        <div class="card-title">
            Aún no verifica su correo.
        </div>
        <div class="card-body">
            Es necesario que verifique su correo para entrar a ese apartado.
            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit" class="boton">Enviar otro link de verificación</button>
            </form>
        </div>
    </div>
</div>

                    

@endsection
