import Glide from '@glidejs/glide';

const sellingBlocksSlider= document.querySelector('.js-sellingblocks-slider');

var sellingBlocksSliderConfig = {
    // arrows: true,
    // startAt: 0,
    perView: 3,
    gap: 32,
    type: 'carousel',
    breakpoints: {
      1200: {
        gap: 24,
        perView: 2,
      },
      600: {
        gap: 16,
        perView: 1,
      }
    }
};

if (sellingBlocksSlider) {
    var glide = new Glide(sellingBlocksSlider, sellingBlocksSliderConfig);
    glide.mount();
}