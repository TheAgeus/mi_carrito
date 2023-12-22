<style>
    .producto-nonSlider-container {
        display: flex;
        width: 95%;
        margin-inline: auto;
        gap: 0.5rem;
        margin-block: 2rem 5rem;
        flex-wrap: wrap;
    }
    .producto-nonSlider-card {
        flex: 1;
        border: 1px solid rgba(0, 0, 0, 0.4);
        border-radius: 20px;
        display: flex;
        flex-direction: column;
        position: relative;
        max-width: 300px;
        justify-content: space-between;
    }
    .producto-nonSlider-card-img{
        width: 100%;
        display:flex;
        justify-content: center;
        padding-top: 3rem;
        padding-bottom: 1rem;
        margin-block: auto; 
    }
    .producto-nonSlider-card-img img{
        width: 90%;
        max-width: 300px;
        max-height: 300px;
    }
    .producto-nonSlider-card-text{
        padding-inline: 1rem;
        padding-block: 1rem;
    }
    .producto-nonSlider-card-text .precio-producto{
        color: red;
        font-size: 1.5rem; 
        font-weight: bold;
    }
    .producto-nonSlider-card .hidden-link {
        width: 100%;
        height: 100%;
        z-index: 10;
        position: absolute;
    }

    @media(width < 700px){
        .producto-nonSlider-card {
            min-width: 300px
        }
    }
</style>

<div class="section-title">
    Artículos estrella.
</div>

<div class="producto-nonSlider-container">
    @foreach ($nonSliderArticles as $nonSliderArticle)
    
        <div class="producto-nonSlider-card">
            
            <a class="hidden-link" href="/producto/{{$nonSliderArticle->id}}"></a>

            <div class="producto-nonSlider-card-img">
                <img src="{{env('APP_URL') . '/storage/images/productos/' . $nonSliderArticle->img_path }}" alt="">
            </div>

            <div class="producto-nonSlider-card-text">

                <div class="precio-producto">
                    <div> ${{ $nonSliderArticle->precio_mx }} mx </div>
                </div>

                <div class="nombre-producto">
                    <div> {{ $nonSliderArticle->name }} </div>
                </div>
            </div>
        </div>
    
    @endforeach
</div>
