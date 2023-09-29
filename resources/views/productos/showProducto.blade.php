@extends('layouts.layout')
@section('content')

    <div class="fullcontainer">

        <div class="container-start">
            <div class="mycontainer">
                <img src="{{env('APP_URL') . '/storage/images/productos/' . $producto->img_path}}" alt="">
            </div>    
        </div>

        <div class="container-end">
            <div class="mycontainer">
                <strong>Nombre:</strong> {{$producto->name}}
            </div>
            <div class="mycontainer">
                <strong>Precio:</strong> {{$producto->precio_mx}} MXN
            </div>
            <div class="mycontainer">
                <strong>Stock:</strong> {{$producto->stock}}
            </div>
            <div class="mycontainer">
                <strong>Categoria:</strong> {{$producto->categoria->name}}
            </div>
            <div class="mycontainer">
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maxime quo rerum et, quae aliquid, aspernatur explicabo, dolore debitis odio aliquam maiores nihil quis! Quod quas magni praesentium velit. Minima, voluptate?
            </div>
        </div>
        
    </div>



    <style>

        .mycontainer > img {
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        .mycontainer{
                margin-inline: 1rem;
            }

        @media (700px < width) {
            .container-start{
                padding: 1rem;
                margin: 2px;
                margin-top: 1rem;
            }
            .container-end {
                width: 50%;
                padding-inline: 3rem;
            }
            .container-end > .mycontainer{
                margin-block: 2rem;
            }

            .fullcontainer{
                width: 100%;
    
                display: flex;
                justify-content: center;
                align-items: center;
    
                padding-inline: 3rem;
            }
            
        }

        @media (700px > width){
            .container-start{
                border: 1px solid rgba(105, 105, 105,0.5);

            }
            .fullcontainer{
                flex-direction: column;
            }
            .mycontainer {
                margin-block: 1rem;
            }
            .mycontainer > img {
                width: 100%
            }
        }

    </style>

@endsection



