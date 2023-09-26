<div>
    @if (session()->has('errorToModal'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{session()->get('errorToModal')}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
    @endif

    <div class="card">
        <img src="{{asset('/storage/images/productos/' . $producto->img_path)}}" class="img-fluid img-thumbnail" style="height: 300px;" alt="...">
    
        <div class="container mt-3">
            <h3>{{$producto->name}}</h3>
        </div>

        <div class="container row m-auto mt-2 mb-3">
            <div class="fw-semibold col p-0">${{$producto->precio_mx}} MX</div>
            Stock: {{$producto->stock}}
        </div>

        <div class="container">
            Cantidad a comprar:
            <div class="input-group mb-3">
                <input wire:model="cantidad" type="number" class="form-control" placeholder="" aria-label="Recipient's username" min="1">
                <button wire:click="addToCart({{Auth()->user()->id}})" class="btn btn-outline-success" type="button">Add to cart</button>
            </div>
        </div>

        

    </div>


   

</div>
