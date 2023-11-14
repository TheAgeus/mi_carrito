@extends('layouts.main-layout')

@section('content')

    <style>
        .card {
            border: 10px solid rgba(0,0,0,0.1);
            background-color: rgba(0,255,0,0.1);
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
        @media(width < 600px) {
            .card {
                width: 90%;
            }
        }
    </style>

    <div class="full-container">
        <div class="card">
            <div class="card-title">
                Correo enviado.
            </div>
            <div class="card-body">
                Se ha enviado un mensaje de confirmación a tu correo, revíselo por favor.
            </div>
        </div>
    </div>

@endsection