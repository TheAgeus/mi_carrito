<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PayPal JS SDK Standard Integration</title>
  </head>
  <body>

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
            margin-block: 1rem;
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
    </style>

    <div class="paypal-container">

        <div class="paypal-carrito-list">

        </div>

        <div class="total-total-carrito">

        </div>

        <div id="paypal-button-container"></div>
        <p id="result-message"></p>
    </div>


   
    <script src="https://www.paypal.com/sdk/js?client-id=ASRylTwsN8rQTGb1eekEovs-my9xQgJ3EpjWu-OA2p5Y2oK28dkiq2niKAHfv4Dkv7T74e-UkIN49hj6&currency=MXN&disable-funding=credit,card"></script>
    <script>
        window.paypal
            .Buttons({
                async createOrder(data, actions) {
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value: 69
                            }
                        }]
                    })
                    /*try {
                            const response = await fetch("/api/orders", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                            },
                            // use the "body" param to optionally pass additional order information
                            // like product ids and quantities
                            body: JSON.stringify({
                                cart: [
                                    {
                                        id: "YOUR_PRODUCT_ID",
                                        quantity: "YOUR_PRODUCT_QUANTITY",
                                    },
                                ],
                            }),
                        });
                        
                        const orderData = await response.json();
                        

                        if (orderData.id) {
                            return orderData.id;
                        } else {
                        const errorDetail = orderData?.details?.[0];
                        const errorMessage = errorDetail
                            ? `${errorDetail.issue} ${errorDetail.description} (${orderData.debug_id})`
                            : JSON.stringify(orderData);
                        
                        throw new Error(errorMessage);
                        }
                    } catch (error) {
                        console.error(error);
                        resultMessage(`Could not initiate PayPal Checkout...<br><br>${error}`);
                    }*/

                },

                async onApprove(data, actions) {
                    /*try {
                        const response = await fetch("/api/orders/" + data.orderID + "/capture", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                            },
                        });
                        
                        const orderData = await response.json();
                        // Three cases to handle:
                        //   (1) Recoverable INSTRUMENT_DECLINED -> call actions.restart()
                        //   (2) Other non-recoverable errors -> Show a failure message
                        //   (3) Successful transaction -> Show confirmation or thank you message
                        
                        const errorDetail = orderData?.details?.[0];
                        
                        if (errorDetail?.issue === "INSTRUMENT_DECLINED") {
                        // (1) Recoverable INSTRUMENT_DECLINED -> call actions.restart()
                        // recoverable state, per https://developer.paypal.com/docs/checkout/standard/customize/handle-funding-failures/
                        return actions.restart();
                        } else if (errorDetail) {
                        // (2) Other non-recoverable errors -> Show a failure message
                        throw new Error(`${errorDetail.description} (${orderData.debug_id})`);
                        } else if (!orderData.purchase_units) {
                        throw new Error(JSON.stringify(orderData));
                        } else {
                        // (3) Successful transaction -> Show confirmation or thank you message
                        // Or go to another URL:  actions.redirect('thank_you.html');
                        const transaction =
                            orderData?.purchase_units?.[0]?.payments?.captures?.[0] ||
                            orderData?.purchase_units?.[0]?.payments?.authorizations?.[0];
                        resultMessage(
                            `Transaction ${transaction.status}: ${transaction.id}<br><br>See console for all available details`,
                        );
                        console.log(
                            "Capture result",
                            orderData,
                            JSON.stringify(orderData, null, 2),
                        );
                        }
                    } catch (error) {
                        console.error(error);
                        resultMessage(
                        `Sorry, your transaction could not be processed...<br><br>${error}`,
                        );
                    }*/
                    actions.order.capture().then(function (detalles){
                        console.log(detalles)
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

        total = 0;
        cartArray = cartArray.filter(obj => obj.cantidad !== 0);

        const paypal_total_carrito = document.querySelector('.total-total-carrito')
        const paypal_carrito_list = document.querySelector('.paypal-carrito-list')
        
        if(cartArray != null) {
            if (cartArray.length > 0) {
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
    </script>
  </body>
</html>