const add_products_buttons = document.querySelectorAll('.add-product-btn');
const carrito_count_element = document.querySelector('.carrito-items-counter');

const close_carrito_list_btn = document.querySelector('.close-carrito-list-btn');
const carrito_list_container = document.querySelector('.carrito-list-container');
const carrito_icon = document.querySelector('.carrito-container');

close_carrito_list_btn.addEventListener('click',  () => {
    carrito_list_container.style.transform = `translateX(0%)`
});
carrito_icon.addEventListener('click', () => {
    carrito_list_container.style.transform = `translateX(-100%)`
});

let cartCounter = 0;
let cartArray = [];

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

add_products_buttons.forEach((button, i) => {
    add_products_buttons[i].addEventListener('click', () => {
        
        producto_name = document.querySelector('.agregar-random-article-to-card-btn-container')
                                .nextElementSibling.querySelector('a').text.replace(/\\n/g, '').trim()
        

        let position = cartArray.findIndex((value) => value.nombreProducto === producto_name);
        if(cartArray.length <= 0){
            cartArray = [{
                nombreProducto: producto_name,
                cantidad: 1
            }]
        }
        else if (position < 0) {
            cartArray.push({
                nombreProducto: producto_name,
                cantidad: 1
            })
        }
        else {
            cartArray[position].cantidad = cartArray[position].cantidad + 1
        }


        increment_cart_count()
        saveCounterToMemory()
    })
})

loadCounterFromMemory()
refreshCounter()