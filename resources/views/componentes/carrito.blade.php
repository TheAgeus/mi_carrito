<style>
    .carrito-container{
        width: 2rem;
        height: 2rem;
        box-shadow: 1px 1px 5px black;
        padding: 1rem;
        border-radius: 100%;
        position: fixed;
        bottom:1rem;
        right: 1rem;
        z-index: 100;
        background-color: white;
    }
    .carrito-container img {
        width: 100%;
    }
    .carrito-items-counter {
        position: absolute;
        background-color: red;
        width: 2rem;
        aspect-ratio: 1/1;
        border-radius: 100%;
        text-align: center;
        font-size: 0.9rem;
        font-weight: bold;
        top: -20%;
        left: -20%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .carrito-container:hover {
        cursor: pointer;
    }

    .carrito-list-container {
        width: 50%;
        height: 100%;
        position: fixed;
        background-color: rgb(255, 255, 255);
        right: -50%;
        bottom: 0;
        z-index: 1000;
        display: flex;
        flex-direction: column;
        transition: all, .5s ease;
    }
    @media(width < 700px) {
        .carrito-list-container{
            width: 90%;
            right: -90%;
        }
    }
    .carrito-item {
        display: flex;
        justify-content:space-evenly;
    }

    .carrito-list-btn {
        width: 1rem;
        height: 1rem;
        background-color: white;
        border-radius: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .close-carrito-list-btn{
        border-radius: 20px;
        margin-block: 1rem;
    }
    .carrito-list-list-container {
        height: 95%;
        padding-block: 1rem;
    }
    .carrito-list-footer{
       display: flex;
       align-items: center;
       justify-content: center;
    }
    .close-carrito-list-btn {
        border:1px solid rgba(0,0,0,0.2);
        padding: 0.2rem;
        text-align: center;
        background-color: black;
        color: rgb(225, 225, 225);
    }
    .close-carrito-list-btn:hover {cursor: pointer;}
    .carrito-list-btn{cursor: pointer;}
</style>

<div class="carrito-container">
    <img src="{{env('APP_URL') . '/storage/images/icons/shopping-cart.png' }}" alt="">
    <div class="carrito-items-counter">0</div>
</div>


<div class="carrito-list-container">
    
    <div class="carrito-list-list-container">
        <div class="carrito-item">
            <img src="" alt="">
            <div class="carrito-item-name">
                Un nombre muy largo
            </div>
            <div class="increment-btn carrito-list-btn">+</div>
            <div class="item-cantidad">1</div>
            <div class="decrement-btn carrito-list-btn">-</div>
        </div>
    </div>

    <div class="carrito-list-footer">
        <div class="close-carrito-list-btn">Cerrar</div>
    </div>
</div>
