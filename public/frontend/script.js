let searchBtn = document.querySelector('#search-btn');
let searchBar = document.querySelector('.search-bar-container');
let formBtn = document.querySelector('#login-btn');
let loginForm = document.querySelector('.login-form-container');
let formClose = document.querySelector('#form-close');
let link = document.querySelectorAll('.link');
let menu = document.querySelector('#menu-bar');
let menuItems = document.querySelectorAll('.link');
let menuArray = Array.from(menuItems);
let navbar = document.querySelector('.navbar');
let videoBtn = document.querySelectorAll('.vid-btn');

window.onscroll = () => {
    searchBtn.classList.remove('fa-times');
    searchBar.classList.remove('active');
    menu.classList.remove('fa-times');
    navbar.classList.remove('active');
    loginForm.classList.remove('active');
}

menu.addEventListener('click', () => {
    menu.classList.toggle('fa-times');
    // console.log(Array.isArray(menu))
    navbar.classList.toggle('navbar-active')
    navbar.classList.toggle('active');



})
searchBtn.addEventListener('click', () => {
    searchBar.classList.toggle('fa-times');
    searchBar.classList.toggle('active');

})
formBtn.addEventListener('click', () => {
    loginForm.classList.add('active');

})
formClose.addEventListener('click', () => {
    loginForm.classList.remove('active');

})
videoBtn.forEach(btn => {
    btn.addEventListener('click', () => {
        document.querySelector('.controls .active').classList.remove('active');
        btn.classList.add('active');
        let src = btn.getAttribute('data-src');
        document.querySelector('#video-slider').src = src;
    });
});
var swiper = new Swiper(".review-slider", {
    spaceBetween: 2,
    loop: true,
    autoplay: {
        delay: 2000,
        disableOnInteraction: false,
    },
    breakpoints: {
        640: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 2,
        },
        1024: {
            slidesPerView: 3,
        },
    },
});

