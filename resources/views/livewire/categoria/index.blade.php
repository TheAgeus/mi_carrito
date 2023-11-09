<div>

    <style>
        .pagination {
            align-self: center;
        }
    </style>

    <div class="min-vh-100 d-flex flex-column ">
        <div class="row mb-5"></div>
        <div class="row mb-3"></div>
        @error('name') 
            <div class="alert alert-danger" role="alert">
                {{$message}}
            </div> 
        @enderror
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
            
        <div class="d-flex flex-sm-row flex-column justify-content-between mb-3">
            <h3>Lista de las categorías</h3>  
            <form wire:submit="save" class="d-flex mb-2" role="button">
                @if(Session::has('success'))
                    <div class="alert alert-success mb-3" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif
                
                <input wire:model="name" class="form-control " type="text" placeholder="Agregar Categoría" aria-label="Agregar">
                <button style="--bs-btn-font-weight: 600;" class="btn btn-success ms-2" type="submit">Agregar</button>
            </form>
        </div>
        

        <table class="table table d-inline  table-bordered">
            <thead class="table-dark">
                <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Imagen</th>
                <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorias as $categoria)
                <tr>
                    <td>{{$categoria->id}}</th>
                    <td>{{$categoria->name}}</td>
                    <td class="text-center">
                        <img width="40px" height="40px" src="{{env('APP_URL') . '/storage/images/categorias/' . $categoria->img_path}}" alt="">
                    </td>
                    <td>
                        <button wire:click="delete({{$categoria->id}})" type="button" class="btn btn-outline-danger btn-sm">Eliminar</button>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{$categoria->id}}">
                            Editar
                        </button>
                        
                        <!-- Modal -->
                        <div wire:ignore.self class="modal fade" id="exampleModal{{$categoria->id}}" tabindex="-1" aria-labelledby="exampleModal{{$categoria->id}}Label" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModal{{$categoria->id}}Label">Editar Categoría "{{$categoria->name}}"</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input wire:model="name" class="form-control" type="text" placeholder="{{$categoria->name}}" aria-label="Agregar">

                                        <div class="mb-3">
                                            <label for="img" class="form-label">Imagen del producto @error('img') <span style="color: red"> {{ $message }} </span> @enderror</label>
                                            <input wire:model="img" class="form-control" type="file" id="img">
                                        </div>

                                    </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <button wire:click="edit({{$categoria->id}})" data-bs-dismiss="modal" type="button" class="btn btn-primary">Guardar Cambios
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>




        {{ $categorias->links() }}
    </div>


</div>



