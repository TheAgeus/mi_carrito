@extends('layouts.main-layout')
@section('content')

<div class="full_container">
    <h1>Todas las ventas</h1>
    @foreach($ventas as $pago)
        <div class="compra">
            <div class="info">
            <span>
                <b>Pagado:</b>  <br> ${{ $pago->monto }}
            </span>
            <span>
                <b>Fecha:</b>  <br> {{ $pago->fecha() }}
            </span>
            <span>
                <b>Dirección:</b>  <br> {{ $pago->address }}
            </span>
            <span>
                <b>Articulos:</b>  {{ $pago->cantidad_total() }}
            </span>
            <span>
                <b>Usuario:</b>  {{ $pago->id_usuario }}
            </span>
            <span>
                <b>Estado:</b>  {{ $pago->estado }}
            </span>
        </div>
        <span class="end">
            <a href="/mis_compras/{{ $pago->id }}">Ver detalles...</a>
        </span>
        </div>
        <form class="estado" method="POST" action="/ventas_cambiar_estado">
            @csrf
            @method('PATCH')
            <div>
                <span>Cambiar estado:</span>
                <select name="estado" id="estado">
                    <option value="Pagado">Pagado</option>
                    <option value="En camino">En camino</option>
                    <option value="Entregado">Entregado</option>
                </select>
                <input type="hidden" name="pago_id" value="{{$pago->id}}">
            </div>
            <div class="enviar">
                <button type="submit">cambiar</button>
            </div>
        </form>
    @endforeach
</div>

<style>
    h1 {
        font-size: 1.5rem;
    }
    .enviar {
        background-color: black;
    }
    .enviar button:hover {
        cursor: pointer;
    }
    .enviar button {
        color: white;
        background: none;
        border:none;
    }
    #estado {
        font-size: 0.8rem;
    }
    .estado {
        margin-bottom: 2rem;
        padding-inline: 1rem;
        background-color: rgb(247, 247, 255);
        display: flex;
        justify-content: space-between;
        font-size: 0.8rem;
        padding-bottom: 0.5rem;
    }
    .full_container {
        margin-inline: 5%; 
    }
    .compra {
        font-size: 0.8rem;
        color: rgb(55, 55, 55);
        display: flex;
        padding: 1rem;

        background-color: rgb(247, 247, 255);
    }
    .info {
        display: flex;
        flex-wrap: wrap;
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