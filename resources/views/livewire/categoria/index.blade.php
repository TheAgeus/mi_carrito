<div>

    <div class="min-vh-100 d-flex flex-column justify-content-center">
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
        <div class="d-flex flex-row justify-content-between mb-3">
            <h3>Lista de las categorías</h3>
           
            <form wire:submit="save" class="d-flex" role="button">
                @if(Session::has('success'))
                    <div class="alert alert-success mb-3" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif
                
                <input wire:model="name" class="form-control" type="text" placeholder="Agregar Categoría" aria-label="Agregar">
                <button class="btn btn-outline-success" type="submit">Agregar</button>
            </form>
        </div>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th style="text-align: right" scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorias as $categoria)
                <tr>
                    <th scope="row">{{$categoria->id}}</th>
                    <td>{{$categoria->name}}</td>
                    <td style="text-align: right;">
                        <button wire:click="delete({{$categoria->id}})" type="button" class="btn btn-outline-danger">Eliminar</button>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$categoria->id}}">
                            Editar
                        </button>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{$categoria->id}}" tabindex="-1" aria-labelledby="exampleModal{{$categoria->id}}Label" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModal{{$categoria->id}}Label">Editar Categoría "{{$categoria->name}}"</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input wire:model="name" class="form-control" type="text" placeholder="Nuevo Nombre" aria-label="Agregar">
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button wire:click="edit({{$categoria->id}})" data-bs-dismiss="modal" type="button" class="btn btn-primary">Guardar Cambios</button>
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



