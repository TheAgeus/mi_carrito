@extends('layouts.layout')
@section('content')
    {{--    
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
    --}}
    <?php $index = 0 ?>

    <div class="container mt-3">
        @foreach($items as $venta_id => $items)
            <?php $index += 1 ?>
            <div class="container compra-container mb-5 border-top border-bottom">
                <h2 class="mt-3 text-center" >  <strong>Compra: {{$index}} </strong> </h2>
                <div class="row row-cols-1 row-cols-md-3 g-3 justify-content-center gap-3 ">
                    <?php $total = 0 ?>
                    @foreach($items as $item)  
                    <?php $total += $item->producto->precio_mx * $item->cantidad ?>
                      
                        <div class="card">
                            <img src="{{env('APP_URL') . '/storage/images/productos/' . $item->producto->img_path}}" class="img-fluid  myimg" alt="...">
                        
                    
                            <style>
                                .myimg{
                                    max-width: 400px;
                                    aspect-ratio: 5/4;
                                }
                            </style>
                    
                            <div class="container mt-3">
                                <h5><a href="{{route('showProducto', $item->producto->id)}}">{{$item->producto->name}}</a></h5>
                            </div>
                    
                            <div class="container">
                                <strong>Precio unitario: </strong>{{ $item->producto->precio_mx }} MXN
                            </div>
                            <div class="container">
                                <strong>Cantidad comprada: </strong>{{ $item->cantidad }}
                            </div>
                            <div class="container">
                                <strong>Total del item:</strong> {{$item->producto->precio_mx * $item->cantidad}} MXN
                            </div>
        
                
                        </div>
                    @endforeach
                    
                </div>
                <div class="container text-center mt-3 mb-3">
                    <h4>TOTAL DE LA COMPRA: {{$total}} MXN</h4>
                </div>
            </div>
        @endforeach
    </div>

    <style>
        @media (width < 400px) {
            .compra-container {
                text-align: center
            }
        }
    </style>

@endsection