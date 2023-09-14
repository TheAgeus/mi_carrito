
<table>
    <thead>
        <tr>
        <th style="background-color: black; color:white; font-size:12px; text-align: center; font-weight: bold;">Código</th>
        <th style="background-color: black; color:white; font-size:12px; text-align: center; font-weight: bold;">Nombre</th>
        <th style="background-color: black; color:white; font-size:12px; text-align: center; font-weight: bold;">Precio(MX)</th>
        <th style="background-color: black; color:white; font-size:12px; text-align: center; font-weight: bold;">Stock</th>
        <th style="background-color: black; color:white; font-size:12px; text-align: center; font-weight: bold;">Agregó</th>
        <th style="background-color: black; color:white; font-size:12px; text-align: center; font-weight: bold;">Categoría</th>
        <th style="background-color: black; color:white; font-size:12px; text-align: center; font-weight: bold;">Código de Proveedor</th>
        <th style="background-color: black; color:white; font-size:12px; text-align: center; font-weight: bold;">Proveedor</th>
        <th style="background-color: black; color:white; font-size:12px; text-align: center; font-weight: bold;">Precio de Proveedor</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($productos as $producto)
            <tr>
                <td style="text-align: center; font-size:12px; padding:5px;">{{$producto->id}}</td>
                <td style="text-align: center; font-size:12px; padding:5px;">{{$producto->name}}</td>
                <td style="text-align: center; font-size:12px; padding:5px;">{{$producto->precio_mx}}</td>
                <td style="text-align: center; font-size:12px; padding:5px;">{{$producto->stock}}</td>
                <td style="text-align: center; font-size:12px; padding:5px;">{{$producto->usuario->name}}</td>       
                <td style="text-align: center; font-size:12px; padding:5px;">{{$producto->categoria->name ?? '-'}}</td>
                <td style="text-align: center; font-size:12px; padding:5px;">{{$producto->codigo_proveedor}}</td>
                <td style="text-align: center; font-size:12px; padding:5px;">{{$producto->proveedor}}</td>
                <td style="text-align: center; font-size:12px; padding:5px;">{{$producto->precio_proveedor}}</td>
            </tr>
        @endforeach
    </tbody>
</table>