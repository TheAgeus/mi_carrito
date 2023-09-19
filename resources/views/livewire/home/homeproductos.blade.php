<div>
    <div class="row row-cols-1 row-cols-md-3 g-4 mt-3">
        @foreach($productos as $producto)
            @livewire('home.homeproducto', ['producto' => $producto], key('item-'.$producto->id))   
        @endforeach
      </div>
</div>
