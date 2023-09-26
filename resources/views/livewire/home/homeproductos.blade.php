<div>
    

    <div class="container mt-3">
        <h3>{{$title}}</h3>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-3 mt-3">
        @foreach($productos as $producto)
            @livewire('home.homeproducto', ['producto' => $producto], key('item-'.$producto->id))   
        @endforeach
      </div>
</div>
