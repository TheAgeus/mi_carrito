const nextButton = document.querySelector('.next-button')
const previousButton = document.querySelector('.previous-button')
const categoriaSlider = document.querySelector('.categoria-slider')

nextButton.addEventListener('click', () => {
    categoriaSlider.style.transform = `translateX(-50%)`
})

previousButton.addEventListener('click', () => {
    categoriaSlider.style.transform = `translateX(0%)`
})