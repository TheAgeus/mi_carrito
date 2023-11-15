<link rel="stylesheet" href="{{asset('css/slider/random-articles-slider.css') }}">

<div class="section-title">
    Artículos varios.
</div>

<div class="random-articles-slider-container">

    <div class="random-articles-slider">

        <?php $slides = $random_articles->splitIn(2); ?>

        @foreach($slides as $slide)

            <div class="random-article-slide">

                @foreach($slide as $random_article)
                    
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
            
        @endforeach

    </div>

    <ul class="random-articles-slider-checkbox-container">
        <li class="random-article-slider-checkbox activo"></li>
        <li class="random-article-slider-checkbox"></li>
    </ul>

</div>

<script type="text/javascript" src="{{asset('js/random-product-slider.js')}}"></script>
