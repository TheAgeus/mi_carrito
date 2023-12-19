@extends('layouts.main-layout')
@section('content')

    <link rel="stylesheet" href="{{asset('css/ShowProducto/producto.css') }}">    
    <link rel="stylesheet" href="{{asset('css/ShowProducto/form_enviar_producto.css') }}">
    <link rel="stylesheet" href="{{asset('css/ShowProducto/comentarios.css') }}">
    @include('componentes.carrito')

    <div class="fullcontainer">
        <div class="container-1">
            <div class="mycontainer">
                <img src="{{env('APP_URL') . '/storage/images/productos/' . $producto->img_path}}" alt="">
            </div>    
        </div>
        <div class="container-2">
            <div class="mycontainer product-name">
                {{$producto->name}}
            </div>
            <div class="mycontainer precio">
                ${{$producto->precio_mx}} MXN
            </div>
            <div class="mycontainer piezas">
                {{$producto->stock}} piezas
            </div>
            <div class="mycontainer descripcion">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aliquid obcaecati ratione facilis in, quisquam est ullam temporibus, nihil odit ad enim. Quaerat exercitationem explicabo nesciunt velit mollitia autem modi odio.
            </div>
            <div class="random-article-container">

                <div class="random-article-img-container" style="display: none;">
                    <a href="/producto/{{$producto->id}}" class="hidden-link"></a>
                    <img src="{{env('APP_URL') . '/storage/images/productos/' . $producto->img_path}}" alt="">
                </div>
                <div class="agregar-random-article-to-card-btn-container">
                    <button class="add-product-btn" type="submit">Agregar +</button>
                </div>

                <div class="random-article-text" style="display: none;">
                    <a href="/producto/{{$producto->id}}" class="random-article-name-link">
                        {{ $producto->name }}
                    </a>

                    <div class="random-article-rate">

                        <?php $article_stars = $producto->average_score() ?>

                        {{ $producto->average_score() }} / 5

                        @for ($i = 1; $i <= $article_stars; $i++)
                            <img src="{{env('APP_URL') . '/storage/images/icons/estrella.png'}}">
                        @endfor

                    </div>
                    <div class="random-article-price">
                        ${{ $producto->precio_mx }} mx
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    @if(count($comentarios) > 0)
        <div class="comentarios-wrapper">
            <div class="comentarios_box_title">
                Opiniones de los clientes
            </div>
            <div class="comentarios_box">
                
                @foreach ($comentarios as $comentario)
        
                    <?php $calificacion = $comentario->calificacion?>
        
                    <div class="comentario_box">
                        <div class="comentario_box_head">
                            <div class="avatar_name_stars">
                                <div class="avatar">
                                    <div class="letra">
                                        {{$comentario->usuario->name[0]}}
                                    </div>
                                </div>
                                <div class="name_stars">
        
                                    <div class="comentario_head_title">{{$comentario->usuario->name}}</div>
                                    <div class="comentario_head_calificacion">
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
                            </div>
                            <div class="comentario_box_body">
                                {{$comentario->comentario}}
                            </div>
                            <div class="comentario_head_fecha">{{$comentario->created_at}}</div>
                        </div> 
                    </div>
                @endforeach
            </div>
        </div>
    @endif
    <div class="container-3">
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
                    <div class="write_comentario_textarea">
                        <textarea name="comentario" required form="comentario_form" placeholder="Escribe tu comentario aquí {{Auth()->user()->name}}" maxlength="500"></textarea>
                    </div>
                    <div class="form_group">
                        <div class="calificacion_input">
                            <span>
                                Calificación:
                            </span>
                            <input name="calificacion" required type="number" min="1" max="5" placeholder="1" value="1">
                        </div>
                        <div class="write_comentario_button">
                            <button type="submit">Enviar Comentario</button>
                        </div>
                    </div>
                </div>
            </form>
        @endguest
    </div>

    

    <script type="text/javascript" src="{{asset('js/add-product-btn.js')}}"></script>


@endsection



