<div>

    <!-- CONTENEDOR PRINCIPAL -->

    <div class="min-vh-100 d-flex flex-column">
        <div class="row mb-5"></div>
        <div class="row mb-3"></div>
       
        <!-- Mostrar mensajes -->

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li><span style="color: red;">{{ $error }}</span></li>
                @endforeach
            </ul>
        @endif
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <!-- Botón de Agregar Producto -->

        <div class="container d-flex justify-content-end p-0">
            <button style="--bs-btn-font-weight: 600;" 
                    type="submit" class="btn btn-success " 
                    data-bs-toggle="modal" 
                    data-bs-target="#exampleModal">Agregar Producto</button>
        </div>

        <!-- Modal -->
        <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">AGREGAR PRODUCTO</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="save({{Auth()->user()->id}})">
                    
                    @if ($errors->any())
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li><span style="color: red;">{{ $error }}</span></li>
                            @endforeach
                        </ul>
                    @endif

                    <h6>Datos de Producto:</h6>

                    <div class="input-group mb-3">
                        <span class="input-group-text">Nombre</span>
                        <input wire:model="name" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                    </div>
                    
                    
                    <div class="row">
                        <div class="input-group mb-3 col">
                            <span class="input-group-text">Precio</span>
                            <input wire:model="precio_mx" step="any" type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>

                        <div class="input-group mb-3 col">
                            <span class="input-group-text">Stock </span>
                            <input wire:model="stock" type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">Categoria</span>
                            <select wire:model="categoria_id" class="form-select" aria-label="Default select example">
                                <option value=""></option>
                                @foreach ($categorias as $categoria)
                                    <option value="{{$categoria->id}}">{{$categoria->name}}</option>
                                @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="img" class="form-label">Imagen del producto</label>
                        <input wire:model="img" class="form-control" type="file" id="img">
                    </div>


                    <h6>Datos de Proveedor:</h6>

                    <div class="input-group mb-3">
                        <span class="input-group-text">Codigo de proveedor</span>
                        <input wire:model="codigo_proveedor" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">Nombre de proveedor</span>
                        <input wire:model="proveedor" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">Precio de proveedor</span>
                        <input wire:model="precio_proveedor" step="any" type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                    </div>


                    <div class="modal-footer pb-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Enviar</button>

                    </div>
                </form>
            </div>
            
            </div>
        </div>
        </div>

        <!-- Titulo de la tabla -->
        <div class="d-flex flex-row justify-content-between mb-3">
            <h3>Lista de las productos</h3>
        </div>

        <!-- TABLA DE PRODUCTOS -->
        <table class="table ">
            <thead class="table-dark">
                <tr>
                <th class="text-center" scope="col">Código</th>
                <th class="text-center" scope="col">Nombre</th>
                <th class="text-center" scope="col">Precio(MX)</th>
                <th class="text-center" scope="col">Stock</th>
                <th class="text-center" scope="col">Agregó</th>
                <th class="text-center" scope="col">Categoría</th>
                <th class="text-center" scope="col">Código de Proveedor</th>
                <th class="text-center" scope="col">Proveedor</th>
                <th class="text-center" scope="col">Precio de Proveedor</th>
                <th class="text-center" scope="col">Imagen</th>
                <th style="text-align: center" scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                <tr>
                    <th class="text-center">{{$producto->id}}</th>
                    <td class="text-center">{{$producto->name}}</td>
                    <td class="text-center">{{$producto->precio_mx}}</td>
                    <td class="text-center">{{$producto->stock}}</td>
                    <td class="text-center">{{$producto->usuario->name}}</td>
                    
                    <td class="text-center">{{$producto->categoria->name ?? '-'}}</td>

                    <td class="text-center">{{$producto->codigo_proveedor}}</td>
                    <td class="text-center">{{$producto->proveedor}}</td>
                    <td class="text-center">{{$producto->precio_proveedor}}</td>
                    <td class="text-center">
                        <img width="30px" height="30px" src="{{asset('/storage/images/productos/' . $producto->img_path)}}" alt="">
                    </td>
                    <td style="text-align: right;">
                        <button wire:click="delete({{$producto->id}})" type="button" class="btn btn-outline-danger btn-sm">Eliminar</button>
                        <button  type="button" class="btn btn-outline-primary btn-sm">Editar</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $productos->links() }}
    </div>


</div>



