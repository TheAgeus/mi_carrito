<link rel="stylesheet" href="{{asset('css/slider/categoria-slider.css') }}">


<div class="categoria-slider-container">
    <div class="next-button my-slider-btn">Next</div>
    <div class="previous-button my-slider-btn">Prev</div>

    <div class="categoria-slider">

        <?php 
            $numberCategorias = count($categorias);
            $slides = $categorias->splitIn(2);
        ?>

        @foreach ($slides as $slide)
            <div class="categoria-slide">
                @foreach ($slide as $item)
                    <div class="categoria-container">
                        <a class="hidden-link" href="/categorias/{{$item->id}}"></a>
                        <div class="categoria-img-container">
                            <img src="{{env('APP_URL') . '/storage/images/categorias/' . $item->img_path }}" alt="">
                        </div>
                        <div class="categoria-text">
                            {{ $item->name }}
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach

        

    </div>
</div>

<script type="text/javascript" src="{{asset('js/categoria-slider.js')}}"></script>
