<link rel="stylesheet" href="{{asset('css/slider/slider.css') }}">

<div class="slider">
    <div class="slide-container">
        <div class="slide">
            <a href="/" class="hidden-link"></a>
            <img src="{{env('APP_URL') . '/storage/images/slider1/slide1.png' }}" alt="">
        </div>
        <div class="slide">
            <a href="/" class="hidden-link"></a>
            <img src="{{env('APP_URL') . '/storage/images/slider1/slide1.png' }}" alt="">
        </div>
        <div class="slide">
            <a href="/" class="hidden-link"></a>
            <img src="{{env('APP_URL') . '/storage/images/slider1/slide1.png' }}" alt="">
        </div>
    </div>

    <ul class="puntos">
        <li class="punto activo"></li>
        <li class="punto"></li>
        <li class="punto"></li>
    </ul>

</div>

<div class="slider-movil">

    <div class="slider-movil-slide-container">
        <div class="slider-movil-slide">
            <img src="{{env('APP_URL') . '/storage/images/slider-movil/slide1.png' }}" alt="">
        </div>
        <div class="slider-movil-slide">
            <img src="{{env('APP_URL') . '/storage/images/slider-movil/slide2.png' }}" alt="">
        </div>
        <div class="slider-movil-slide">
            <img src="{{env('APP_URL') . '/storage/images/slider-movil/slide3.png' }}" alt="">
        </div>
    </div>

    <ul class="slider-movil-puntos">
        <li class="slider-movil-punto"></li>
        <li class="slider-movil-punto"></li>
        <li class="slider-movil-punto"></li>
    </ul>
</div>

<script type="text/javascript" src="{{asset('js/slider.js')}}"></script>
