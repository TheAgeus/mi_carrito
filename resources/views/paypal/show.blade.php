@extends('layouts.main-layout')

@section('content')

    <style>
        .paypal-container {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .carrito-item {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            gap: 1rem;
            padding-block: 1rem;
            border-bottom: 1px solid rgba(0,0,0,0.2);
            flex-wrap: wrap;
        }
        img {
            min-width: 20px;
            max-width: 200px;
            flex: 1;
        }
        a {
            flex: 2;
        }
        .item-cantidad {
            flex: 2;
        }
        .item-total {
            flex: 2;
        }
        .total-total-carrito {
            margin-block: 1rem;
        }
        .address_input {
            margin-block: 1rem;
        }
    </style>

    <div class="paypal-container">

        <div class="paypal-carrito-list">
        </div>

        <div class="total-total-carrito">
        </div>

        <div class="address_input">
            <input id="address_input" type="text" placeholder="Dirección" required>
        </div>

        <div id="paypal-button-container"></div>
        <p id="result-message"></p>
    </div>


   
    <script src="https://www.paypal.com/sdk/js?client-id=AcrrNWlr9S706dWEFmBQgNlipPtmh2NzvsjSYYcn6cdTBWXrkgdUf606y4Pesz1Q8facnSgCXHSAn26l&currency=MXN&disable-funding=credit,card"></script>
    <script>
        window.paypal
            .Buttons({
                async createOrder(data, actions) {
                    
                    address = document.getElementById("address_input").value
                    if( address === "" ){
                        alert("No has escrito la dirección")
                        return
                    }

                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value: total
                            }
                        }]
                    })
                },

                async onApprove(data, actions) {
                    actions.order.capture().then(async function (detalles){
                        console.log(detalles);

                        const data = {
                            id_movimiento: detalles.id,
                            id_usuario:  {{Auth()->user()->id}},
                            monto: detalles.purchase_units[0].amount.value,
                            address: address,
                            items: cartArray
                        }

                        const response = await fetch("/save_success_sale", {
                            method: "POST",
                            headers: {
                                "Content-type" : "application/json"
                            },
                            body: JSON.stringify(data),
                        })

                        .then(response => response.json())
                        .then(responseData => {
                            if (responseData['success'] == 'pago registrado con exito') {
                                localStorage.clear()
                                window.location.href='/mis_compras';
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                    })
                },

                async onCancel(data) {
                    alert("Pago cancelado")
                    console.log(data)
                },
            })
            .render("#paypal-button-container");
            
            // Example function to show a result to the user. Your site's UI library can be used instead.
            function resultMessage(message) {
                const container = document.querySelector("#result-message");
                container.innerHTML = message;
            }


    </script>
    <script type="text/javascript" src="{{asset('js/add-product-btn.js')}}"></script>
    <script>
    async function showCart() {
        total = 0;
        cartArray = cartArray.filter(obj => obj.cantidad !== 0);

        const paypal_total_carrito = document.querySelector('.total-total-carrito')
        const paypal_carrito_list = document.querySelector('.paypal-carrito-list')
        
        if(cartArray != null) {
            if (cartArray.length > 0) {

                // validar el stock
                const response = await fetch("/api/validate-stock", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify(cartArray),
                });
                const orderData = await response.json();
                
                // Si este arreglo tiene algo, hay error, desplegarlo y redirigir a inicio
                cantidad_errores = orderData.length
                mensaje = "No se puede prosegur porque:" + "\n"
                if (cantidad_errores > 0) {
                    orderData.forEach (error => {
                        mensaje = mensaje + error + "\n"
                    })
                    alert(mensaje)
                    window.location.href='/';
                }

                cartArray.forEach (producto => {
                    let newProduct = document.createElement('div')
                    newProduct.classList.add('carrito-item')
                    newProduct.innerHTML = `
                        <img src="${producto.imagenProducto}" alt="">
                        <a href="${producto.hrefProducto}" class="carrito-item-name">${producto.nombreProducto}</a>
                        <div class="item-cantidad">Cantidad: ${producto.cantidad}</div>
                        <div class="item-total">Total item: $${(producto.cantidad * producto.precioProducto).toFixed(2)} mx</div>
                    `
                    paypal_carrito_list.appendChild(newProduct)
                    total = total + (producto.cantidad * producto.precioProducto)
                })
                paypal_total_carrito.innerHTML = `Total: $${total.toFixed(2)} mx`
            }
        
        }
    }
    
    showCart()
        
    </script>

@endsection