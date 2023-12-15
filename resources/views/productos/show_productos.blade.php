@extends('layouts.main-layout')
@section('content')

<div class="container">

    <link rel="stylesheet" href="{{asset('css/ShowCategoria/show-categoria.css') }}">
    <link rel="stylesheet" href="{{asset('css/slider/random-articles-slider.css') }}">
    @include('componentes.carrito')
    @if(count($Productos) == 0)
        <h1 style="padding-inline: 5%;">No se encontraron resultados...</h1>
    @endif
    <div class="categoria-productos-container">
        
        @foreach($Productos as $random_article)
            <div class="random-article-container">
                <div class="random-article-img-container">
                    <a href="/producto/{{$random_article->id}}" class="hidden-link"></a>
                    <img src="{{env('APP_URL') . '/storage/images/productos/' . $random_article->img_path}}" alt="">
                </div>
                <div class="agregar-random-article-to-card-btn-container">
                    <button class="add-product-btn" type="submit">Agregar +</button>
                </div>
        
                <div class="random-article-text">

                    <a href="/producto/{{$random_article->id}}" class="random-article-name-link">
                        {{ $random_article->name }}
                    </a>
        
                    <div class="random-article-rate">
        
                        <?php $article_stars = $random_article->average_score() ?>
        
                        {{ $random_article->average_score() }} / 5
        
                        @for ($i = 1; $i <= $article_stars; $i++)
                            <img src="{{env('APP_URL') . '/storage/images/icons/estrella.png'}}">
                        @endfor
        
                    </div>
                    <div class="random-article-price">
                        ${{ $random_article->precio_mx }} mx
                    </div>
                </div>
        
            </div>
        
        @endforeach
    </div>

    <script type="text/javascript" src="{{asset('js/add-product-btn.js')}}"></script>

</div>

@endsection