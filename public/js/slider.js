const slider = document.querySelector('.slide-container')
const puntos = document.querySelectorAll('.punto')


puntos.forEach ((cadaPunto, i) => {
    puntos[i].addEventListener('click', () => {
        let posicion = i
        let operacion = posicion * -33.3

        slider.style.transform = `translateX(${operacion}%)`

        puntos.forEach( (cadaPunto, j)  => {
            puntos[j].classList.remove('activo')
        })
        puntos[i].classList.add('activo')
    })
})

const slider_movile = document.querySelector('.slider-movil-slide-container');
const slider_movile_dots = document.querySelectorAll('.slider-movil-punto');

slider_movile_dots.forEach ((cadaPunto, i) => {
    slider_movile_dots[i].addEventListener('click', () => {
        let posicion = i
        let operacion = posicion * -33.3

        slider_movile.style.transform = `translateX(${operacion}%)`

        slider_movile_dots.forEach( (cadaPunto, j)  => {
            slider_movile_dots[j].classList.remove('activo')
        })
        slider_movile_dots[i].classList.add('activo')
    })
})