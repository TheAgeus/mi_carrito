@extends('layouts.layout')
@section('content')

    @php
        $total = 0;
    @endphp
    <div class="container mt-5 table-responsive table-bordered">
        <table class="table table-bordered ">
            <thead class="table-dark ">
              <tr>
                <th class="col-1 text-center">Producto ID</th>
                <th class="text-center">Producto Name</th>
                <th class="text-center">Cantidad</th>
                <th class="text-end">Precio Individual</th>
                <th class="text-end">Total</th>
                <th class="col-2 text-center">Acciones</th>
              </tr>
            </thead>
            <tbody>
                @foreach($carrito as $item)
                    <tr>
                        <td class="text-center">{{$item->producto_id}}</td>
                        <td class="text-center">{{$item->producto->name}}</td>
                        <td class="text-center">{{$item->cantidad}}</td>
                        <td class="text-end">$ {{$item->producto->precio_mx}} MX</td>
                        <td class="text-end">$ {{$item->cantidad * $item->producto->precio_mx}} MX</td>
                        <td class="text-center">
                            <form action="{{route('deleteCarritoItem', $item->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"> 
                                    Borrar del Carrito 
                                </button> 
                            </form>
                        </td>      
                        @php
                            $total += $item->cantidad * $item->producto->precio_mx;
                        @endphp
                    </tr>
                @endforeach
                    <tr>
                        <td colspan="4" class="text-end border-top fw-bold">TOTAL:</td>
                        <td colspan="1" class="text-end border-top fw-bold text-danger">$ {{$total}} MX</td>
                        <td colspan="1" class="text-center border-top fw-bold text-danger">
                            
                            <!-- BORRAR CARRITO BUTTON -->
                            <form action="{{route('deleteAllCarritoItem')}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"> 
                                    <strong>
                                        Borrar todo el carrito
                                    </strong> 
                                </button> 
                            </form>    
                        </td>
                    </tr>
            </tbody>
          </table>
        
    </div>

    <!-- PAGAR CARRITO BUTTON -->
    <div class="container">

        <form action="{{route('StripeIndex')}}" method="GET">
            @csrf
            <button type="submit" class="btn btn-success btn-sm"> 
                <strong>
                    Pagar $ {{ $total }}
                </strong> 
            </button> 
        </form>    

    </div>

@endsection
