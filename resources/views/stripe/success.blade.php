<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .text{
            font-size: 3rem;
            color: greenyellow;
            font-weight: bold;
        }
        .link > a{
            color: white;
            font-size: 2rem;
        }
        .full_container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: black;
            flex-direction: column
        }
        body {
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
    @if($status == "succeeded") 
        <div class="full_container">
            <div class="text">
                ¡Pago realizado correctamente!
            </div>
            <div class="link">
                <a href="{{route('MisCompras')}}">Regresar a mis compras</a>
            </div>
        </div>
    @endif
</body>
</html>





