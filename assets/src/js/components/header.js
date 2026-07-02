const menuButton = document.querySelector('.header__menutoggle');
const headerNav = document.querySelector('.header__navigation');

menuButton.addEventListener('click', function(){
    headerNav.classList.toggle('header__navigation--active');
    this.classList.toggle('active');
})