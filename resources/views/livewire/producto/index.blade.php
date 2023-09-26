<div>
    <!-- CONTENEDOR PRINCIPAL -->

    <div class="min-vh-100 d-flex flex-column">
        <div class="row mb-5"></div>
        <div class="row mb-3"></div>


        <!-- Botón de Agregar Producto -->

        <div class="container d-flex p-0 justify-content-sm-end flex  justify-content-center mb-3">
            <button 
                style="--bs-btn-font-weight: 600;" 
                class="btn btn-success me-3" 
                data-bs-toggle="modal" 
                data-bs-target="#exampleModal">
                    Agregar Producto
            </button>
            <button 
                wire:click="exportar()"
                style="--bs-btn-font-weight: 600;" 
                class="btn btn-success">
                    Exportar a excel
            </button>
        </div>

        <!-- Modal -->
        @include('modals.add_producto_modal')
        @include('modals.edit_producto_modal')

        <!-- Titulo de la tabla -->
        <div class="d-flex flex-row justify-content-between mb-3">
            <h3>Lista de las productos</h3>
        </div>

        <!-- TABLA DE PRODUCTOS -->
        <div class="table-responsive table-bordered ">
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
                            <img width="40px" height="40px" src="{{asset('/storage/images/productos/' . $producto->img_path)}}" alt="">
                        </td>
                        <td style="text-align: right;">
                            <button wire:click="delete({{$producto->id}})" type="button" class="btn btn-outline-danger btn-sm">Borrar</button>
                            <button wire:click="loadEditData({{$producto->id}})" data-bs-toggle="modal" data-bs-target="#editProducto" type="button" class="btn btn-outline-primary btn-sm">Editar</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $productos->links() }}

    </div>
</div>



