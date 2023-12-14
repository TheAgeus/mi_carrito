@extends('layouts.main-layout')
@section('content')

<div class="full_container">
    <h1>Mis compras</h1>
    @foreach($pagos as $pago)
    <div class="compra">
        <div class="info">
            <span>
                Pagado: <br> ${{ $pago->monto }}
            </span>
            <span>
                Fecha: <br> {{ $pago->fecha() }}
            </span>
            <span>
                Cantidad de articulos: {{ $pago->cantidad_total() }}
            </span>
        </div>
        <span class="end">
            <a href="/mis_compras/{{ $pago->id }}">Ver detalles...</a>
        </span>
        </div>
    @endforeach
</div>

    <style>
        h1 {
            font-size: 1.5rem;
        }
        .full_container {
            margin-inline: 5%; 
        }
        .compra {
            font-size: 0.8rem;
            color: rgb(55, 55, 55);
            display: flex;
            padding: 1rem;
            margin-bottom: 0.5rem;
            background-color: rgb(247, 247, 255);
        }
        .info {
            display: flex;
            gap: 1rem;
            flex: 2;
        }
        .info > * {
            flex: 1;
        }
        .end {
            flex: 1;
            display: flex;
            justify-content: end;
        }
    </style>

@endsection