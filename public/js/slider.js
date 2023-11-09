const slider = document.querySelector('.slide-container')
const puntos = document.querySelectorAll('.punto')


puntos.forEach ((cadaPunto, i) => {
    puntos[i].addEventListener('click', () => {
        let posicion = i
        let operacion = posicion * -33.3
        console.log(operacion)
        slider.style.transform = `translateX(${operacion}%)`

        puntos.forEach( (cadaPunto, j)  => {
            puntos[j].classList.remove('activo')
        })
        puntos[i].classList.add('activo')
    })
})