const random_articles_slider = document.querySelector('.random-articles-slider')
const random_articles_checkboxes = document.querySelectorAll('.random-article-slider-checkbox')

random_articles_checkboxes.forEach((checkbox, i) => {
    random_articles_checkboxes[i].addEventListener('click', () => {
        let posicion = i
        let operacion = posicion * -50
        random_articles_slider.style.transform = `translateX(${operacion}%)`
        random_articles_checkboxes.forEach((cadaPunto, j) => {
            random_articles_checkboxes[j].classList.remove('activo')
        })
        random_articles_checkboxes[i].classList.add('activo')
    })
});