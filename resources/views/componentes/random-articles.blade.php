<style>
    .producto-nonSlider-container {
        display: flex;
        width: 95%;
        margin-inline: auto;
        gap: 0.5rem

    }
    .producto-nonSlider-card {
        flex: 1;
        border: 1px solid rgba(0, 0, 0, 0.4);
        border-radius: 20px;
        display: flex;
        flex-direction: column;
    }
    .producto-nonSlider-card-img{
        width: 100%;
        display:flex;
        justify-content: center;
    }
    .producto-nonSlider-card-img img{
        width: 90%
    }
    .producto-nonSlider-card-text{
        padding-inline: 1rem;
    }
</style>

<div class="producto-nonSlider-container">
    @foreach ($nonSliderArticles as $nonSliderArticle)
    
        <div class="producto-nonSlider-card">

            <div class="producto-nonSlider-card-img">
                <img src="{{env('APP_URL') . '/storage/images/productos/' . $nonSliderArticle->img_path }}" alt="">
            </div>

            <div class="producto-nonSlider-card-text">
                <div class="nombre-producto">
                    <div> {{ $nonSliderArticle->name }} </div>
                </div>
            </div>
        </div>
    
    @endforeach
</div>
