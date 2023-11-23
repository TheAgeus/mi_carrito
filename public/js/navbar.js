const navbar = document.querySelector('.nav_container');
const navbar_aux = document.querySelector('.nav_auxiliar');

window.onresize = function() {
    navbar_aux.style.height = `${navbar.offsetHeight}px`
}

navbar_aux.style.height = `${navbar.offsetHeight}px`