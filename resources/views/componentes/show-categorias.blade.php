<link rel="stylesheet" href="{{asset('css/slider/categoria-slider.css') }}">

<style>
        .categorias-container-categorias{
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            width: 95%;
            margin-inline: auto;
            column-gap: 0.5rem;
            row-gap: 2rem;
        }
        .categorias-container-categorias .categoria-container {
            width: 100%;
        }

</style>


<div class="section-title">
    Categorías.
</div>




<div class="categorias-container-categorias">
    @foreach ($categorias as $item)
        <div class="categoria-container">
            <a class="hidden-link" href="/categoria/{{$item->id}}"></a>
            <div class="categoria-img-container">
                <img src="{{env('APP_URL') . '/storage/images/categorias/' . $item->img_path }}" alt="">
            </div>
            <div class="categoria-text">
                {{ $item->name }}
            </div>
        </div>
    @endforeach
</div>


        

