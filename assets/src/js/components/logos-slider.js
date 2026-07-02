import Glide from '@glidejs/glide';

const logosSlider = document.querySelector('.js-logos-slider');

var logosSliderConfig = {
    perView: 4,
    gap: 32,
    type: 'carousel',
	autoplay: 1500,
    breakpoints: {
        1024: {
            perView: 3
        },
        600: {
          perView: 2
        }
      }
};

if (logosSlider) {
    var glide = new Glide(logosSlider, logosSliderConfig);
    glide.mount();
}