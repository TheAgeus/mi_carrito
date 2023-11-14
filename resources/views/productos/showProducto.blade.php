@extends('layouts.main-layout')
@section('content')

    <link rel="stylesheet" href="{{asset('css/ShowProducto/producto.css') }}">    
    <link rel="stylesheet" href="{{asset('css/ShowProducto/form_enviar_producto.css') }}">
    <link rel="stylesheet" href="{{asset('css/ShowProducto/comentarios.css') }}">


    <div class="fullcontainer">

        <div class="container-start">
            <div class="mycontainer">
                <img src="{{env('APP_URL') . '/storage/images/productos/' . $producto->img_path}}" alt="">
            </div>    
        </div>

        <div class="container-end">
            <div class="mycontainer">
                <strong>Nombre:</strong> {{$producto->name}}
            </div>
            <div class="mycontainer">
                <strong>Precio:</strong> {{$producto->precio_mx}} MXN
            </div>
            <div class="mycontainer">
                <strong>Stock:</strong> {{$producto->stock}}
            </div>
            <div class="mycontainer">
                <strong>Categoria:</strong> {{$producto->categoria->name}}
            </div>
            <div class="mycontainer">
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maxime quo rerum et, quae aliquid, aspernatur explicabo, dolore debitis odio aliquam maiores nihil quis! Quod quas magni praesentium velit. Minima, voluptate?
            </div>
        </div>
    </div>

    @guest
        
    @else
        <form action="{{ route('agregar_comentario') }}" method="post" id="comentario_form">
            @csrf
            <input type="hidden" name="producto_id" value="{{$producto->id}}">
                
            <div class="write_comentario_form">
                @if(session('NuevoComentario'))
                    <div class="write_comentario_form_mensaje">
                        {{ session('NuevoComentario') }}
                    </div>
                @endif
                <div class="comentarios_box_title">Agregar un comentario:</div>
                <div class="write_comentario_textarea">
                    <textarea name="comentario" required form="comentario_form" placeholder="Escribe tu comentario aquí"></textarea>
                </div>
                <div class="form_group">
                    <div class="calificacion_input">
                        Calificación:
                        <input name="calificacion" required type="number" min="1" max="5" placeholder="1" value="1">
                    </div>
                    <div class="write_comentario_button">
                        <button type="submit">Enviar Comentario</button>
                    </div>
                </div>
            </div>
        </form>
    @endguest
    

    
    <div class="comentarios_box">
        <div class="comentarios_box_title">
            Comentarios del producto:
        </div>
        @foreach ($comentarios as $comentario)

            <?php $calificacion = $comentario->calificacion?>

            <div class="comentario_box">
                <div class="comentario_box_head">
                    <div class="comentario_head_title">Comentario escrito por: <b>{{$comentario->usuario->name}}</b></div>
                    <div class="comentario_head_fecha">Fecha: <b>{{$comentario->created_at}}</b></div>
                    <div class="comentario_head_calificacion">
                        Calificación:
                        
                        @for ($i = 1; $i <= $calificacion; $i++) 
                            <div class="star 
                                @if ($calificacion >= 4) 
                                    green 
                                @elseif ($calificacion == 3)
                                    yellow
                                @else
                                    red
                                @endif
                            "></div>
                        @endfor
                    </div>
                </div>
                <div class="comentario_box_body">
                    {{$comentario->comentario}}
                </div>
            </div>
        @endforeach
    </div>




@endsection



