<div>
    <li class="nav-item dropdown">
        <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
          Categorías
        </button>
        <ul class="dropdown-menu dropdown-menu-dark">
            <li><a wire:click="$dispatch('showCat', { id: {{ -1 }} })" class="dropdown-item">Todas</a></li>
            @foreach($categorias as $categoria)
                <li><a wire:click="$dispatch('showCat', { id: {{ $categoria->id }} })" class="dropdown-item">{{$categoria->name}}</a></li>
            @endforeach
        </ul>
    </li>
</div>
