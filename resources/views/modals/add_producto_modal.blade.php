<style>
    @font-face {
        font-family: 'AmazonEmberLt';
        src: url('/css/fonts/AmazonEmber_Lt.ttf');
        font-weight: normal;
        font-style: normal;
    }
    @font-face {
        font-family: 'AmazonEmberBd';
        src: url('/css/fonts/AmazonEmber_Bd.ttf');
        font-weight: normal;
        font-style: normal;
    }
    @font-face {
        font-family: 'AmazonEmberRg';
        src: url('/css/fonts/AmazonEmber_Rg.ttf');
        font-weight: normal;
        font-style: normal;
    }
    *|* {
        font-family: AmazonEmberRg, Arial, sans-serif !important;
    }
    .text_area {
        width: 100%;
        resize: none;
        height: 5rem;
    }
</style>

<div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">AGREGAR PRODUCTO</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        @if ($errors->any())
            <div class="container">
                <span style="color: red"> <b>¡ERROR AL INTENTAR AGREGAR EL PRODUCTO! </b></span>
            </div>
        @endif
        @if (session()->has('message'))
            <div class="container">
                <span style="color: rgb(1, 182, 70)"> <b>¡{{ session('message') }}! </b></span>
            </div>
        @endif

        <div class="modal-body">
            <form >
                <h6>Datos de Producto:</h6>
                @error('name') <span style="color: red"> {{ $message }} </span> @enderror
                <div class="input-group mb-2">
                    <span class="input-group-text">Nombre</span>
                    <input wire:model="name" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>
                
                <div class="row">
                    <div class="col">
                        <div class="d-flex flex-column">
                            @error('precio_mx') <span style="color: red"> {{ $message }} </span> @enderror
                            <div class="input-group mb-2 col">
                                <span class="input-group-text">Precio</span>
                                <input wire:model="precio_mx" step="any" type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="d-flex flex-column">
                            @error('stock') <span style="color: red"> {{ $message }} </span> @enderror
                            <div class="input-group mb-2 col">
                                <span class="input-group-text">Stock</span>
                                <input wire:model="stock" step="any" type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                            </div>
                        </div>
                    </div>
                </div>

                @error('categoria_id') <span style="color: red"> {{ $message }} </span> @enderror
                <div class="input-group mb-2">
                    <span class="input-group-text">Categoria</span>
                        <select wire:model="categoria_id" class="form-select" aria-label="Default select example">
                            <option value=""></option>
                            @foreach ($categorias as $categoria)
                                <option value="{{$categoria->id}}">{{$categoria->name}}</option>
                            @endforeach
                    </select>
                </div>

                @error('descripcion') <span style="color: red"> {{ $message }} </span> @enderror
                <h6>Descripcion:</h6>

                <textarea class="text_area" wire:model="descripcion" aria-label="Default select example">
                </textarea>


                @if ($img)
                    <img src="{{$img->temporaryUrl()}}" class="img-fluid" alt="">
                @endif
                <div class="mb-3">
                    <label for="img" class="form-label">Imagen del producto @error('img') <span style="color: red"> {{ $message }} </span> @enderror</label>
                    <input wire:model="img" class="form-control" type="file" id="img">
                </div>


                <h6>Datos de Proveedor:</h6>
                @error('codigo_proveedor') <span style="color: red"> {{ $message }} </span> @enderror
                <div class="input-group mb-3">
                    <span class="input-group-text">Codigo de proveedor</span>
                    <input wire:model="codigo_proveedor" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>

                @error('proveedor') <span style="color: red"> {{ $message }} </span> @enderror
                <div class="input-group mb-3">
                    <span class="input-group-text">Nombre de proveedor</span>
                    <input wire:model="proveedor" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>

                @error('precio_proveedor') <span style="color: red"> {{ $message }} </span> @enderror
                <div class="input-group mb-3">
                    <span class="input-group-text">Precio de proveedor</span>
                    <input wire:model="precio_proveedor" step="any" type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>


                <div class="modal-footer pb-0">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button wire:click="save({{Auth()->user()->id}})" type="button" class="btn btn-secondary">Enviar</button>

                </div>
            </form>
        </div>
        
        </div>
    </div>
</div>