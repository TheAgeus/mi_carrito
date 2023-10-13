<div>
    @if (session()->has('errorToModal'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{session()->get('errorToModal')}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
    @endif
    @if (session()->has('product_added'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{session()->get('product_added')}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
    @endif


    <div class="card">
            <img src="{{env('APP_URL') . '/storage/images/productos/' . $producto->img_path}}" class="img-fluid  myimg" alt="...">

        <style>
            .myimg{
                max-width: 400px;
                aspect-ratio: 5/4;
            }
        </style>

        <div class="container mt-3">
            <h3><a href="{{route('showProducto', $producto->id)}}">{{$producto->name}}</a></h3>
        </div>

        <div class="container row m-auto mt-2 mb-3">
            <div class="fw-semibold col p-0">${{$producto->precio_mx}} MX</div>
            Stock: {{$producto->stock}}
        </div>

        @guest
            <div class="alert alert-warning" role="alert">
                Inicia sesion para agregar al carrito
            </div>
        @else
            <div class="container">
                Cantidad a comprar:
                <div class="input-group mb-3">
                    <input wire:model="cantidad" type="number" class="form-control" placeholder="" aria-label="Recipient's username" min="1">
                    <button wire:click="addToCart({{Auth()->user()->id}})" class="btn btn-outline-success" type="button">Add to cart</button>
                </div>
            </div>
        @endguest
 
    </div>
</div>
