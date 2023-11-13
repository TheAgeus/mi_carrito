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

<script type="text/javascript" src="{{asset('js/slider.js')}}"></script>
