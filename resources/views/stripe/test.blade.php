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

<div class="full_container">
    <div class="text">
       ¡Pago realizado correctamente!
    </div>
    <div class="link">
        <a href="{{route('MisCompras')}}">Regresar a mis compras</a>
    </div>
</div>