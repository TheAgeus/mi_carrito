const add_products_buttons = document.querySelectorAll('.add-product-btn');
const carrito_count_element = document.querySelector('.carrito-items-counter');

const close_carrito_list_btn = document.querySelector('.close-carrito-list-btn');
const carrito_list_container = document.querySelector('.carrito-list-container');
const carrito_icon = document.querySelector('.carrito-container');

const carrito_html_list = document.querySelector('.carrito-list-list-container');

const total_carrito = document.querySelector('.total-total-carrito');

close_carrito_list_btn.addEventListener('click',  () => {
    carrito_list_container.style.transform = `translateX(0%)`
});
carrito_icon.addEventListener('click', () => {
    carrito_list_container.style.transform = `translateX(-100%)`
});

let cartCounter = 0;
let cartArray = [];
let cartArrayHtml = [];

const increment_cart_count = () => {
    currentCount = parseInt(carrito_count_element.innerHTML);
    currentCount = currentCount + 1;
    carrito_count_element.innerHTML = currentCount;
    cartCounter = currentCount
}

const refreshCounter = () => {
    carrito_count_element.innerHTML = cartCounter;
}

const saveCounterToMemory = () => {
    localStorage.setItem('cartCounter', cartCounter)
}

const loadCounterFromMemory = () => {
    if (localStorage.getItem('cartCounter')) {
        cartCounter = localStorage.getItem('cartCounter', cartCounter)
    }
}

const incrementQuantity = (producto_name, tipo) => {
    let position = cartArray.findIndex((value) => value.nombreProducto === producto_name);
    if(tipo === "incremento") {
        cartArray[position].cantidad = cartArray[position].cantidad + 1
    }
    else if (tipo === "decremento") {
        cartArray[position].cantidad = cartArray[position].cantidad - 1
    }

    renderCarritoListHtml()
}

const renderCarritoListHtml = () => {

    total= 0;
    cartArray = cartArray.filter(obj => obj.cantidad !== 0);

    carrito_html_list.innerHTML = '';
    if ( cartArray.length > 0 ) {
        cartArray.forEach(producto => {
            let newProduct = document.createElement('div');
            newProduct.classList.add('carrito-item');
            newProduct.innerHTML = `
                <img src="${producto.imagenProducto}" alt="">
                <a href="${producto.hrefProducto}" class="carrito-item-name">${producto.nombreProducto}</a>
                <div class="item-total">$${(producto.cantidad * producto.precioProducto).toFixed(2)} mx</div>
                <div class="controls">
                    <div class="increment-btn carrito-list-btn">+</div>
                    <div class="item-cantidad">${producto.cantidad}</div>
                    <div class="decrement-btn carrito-list-btn">-</div>
                </div>   
            `;
            carrito_html_list.appendChild(newProduct);
            total = total + (producto.cantidad * producto.precioProducto)
        })
        total_carrito.innerHTML = `Total: $${total.toFixed(2)} mx`
    }
}

add_products_buttons.forEach((button, i) => {
    add_products_buttons[i].addEventListener('click', function(e) {

        // get data from html
        producto_name = e.target.parentNode.nextElementSibling.querySelector('a').text.replace(/\\n/g, '').trim()
        producto_img_src = e.target.parentNode.previousElementSibling.querySelector('img').getAttribute('src')
        producto_href = e.target.parentNode.previousElementSibling.querySelector('a').getAttribute('href')
        producto_price = e.target.parentNode.nextElementSibling.querySelector('.random-article-price').innerHTML.replace(/\\n/g, '').replace('$', '').replace('mx', '').trim()

        let position = cartArray.findIndex((value) => value.nombreProducto === producto_name);

        if(cartArray.length <= 0){
            cartArray = [{
                nombreProducto: producto_name,
                imagenProducto: producto_img_src,
                precioProducto: producto_price,
                hrefProducto: producto_href,
                cantidad: 1
            }]
        }
        else if (position < 0) {
            cartArray.push({
                nombreProducto: producto_name,
                imagenProducto: producto_img_src,
                precioProducto: producto_price,
                hrefProducto: producto_href,
                cantidad: 1
            })
        }
        else {
            cartArray[position].cantidad = cartArray[position].cantidad + 1
        }


        renderCarritoListHtml() // Agarra el array de items 'cartArray' y genera los elementos html
        increment_cart_count() // Incrementa en 1 el número de elementos del carrito
        //saveCounterToMemory() // Guarda en el local storage el numeor de elementos en el carrito
    })
})

carrito_html_list.addEventListener('click', (e) => {
    let positionClick = e.target
    if(positionClick.classList.contains('increment-btn') || positionClick.classList.contains('decrement-btn')) {
        let producto_name = positionClick.parentElement.previousElementSibling.previousElementSibling.text
        if(positionClick.classList.contains('increment-btn')) {
            type = "incremento"
        }
        else {
            type = "decremento"
        }
        incrementQuantity(producto_name, type)
    }
})

loadCounterFromMemory()
refreshCounter()