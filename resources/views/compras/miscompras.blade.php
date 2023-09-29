@extends('layouts.layout')
@section('content')

    <?php $index = 0 ?>

    @foreach($items as $venta_id => $items)
        <div class="container mt-5 ">
            <?php $index += 1 ?>
            <h5>Compra no : {{$index}}</h5>
        </div>
        <div class="container table-responsive mb-5">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Producto</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Precio Unitario</th>
                        <th class="text-end" scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total = 0 ?>
                    @foreach($items as $item)
                        <tr>
                            <td>{{ $item->producto->name }}</td>
                            <td>{{ $item->cantidad }}</td>
                            <td>{{ $item->producto->precio_mx }} MXN</td>
                            <td class="text-end">{{ $item->producto->precio_mx * $item->cantidad}} MXN</td>
                            <?php $total += $item->producto->precio_mx * $item->cantidad ?>
                        </tr>
                    @endforeach
                        <tr>
                            <td class="text-end" colspan="4"><strong>TOTAL : {{ $total }} MXN</strong></td>
                        </tr>
                </tbody>
            </table>
        </div>
    @endforeach

@endsection