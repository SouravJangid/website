const header = document.querySelector('.header');
function fixedNavbar() {
    header.classList.toggle('scroll', window.pageYOffset > 0)
}

fixedNavbar();
window.addEventListener('scroll', fixedNavbar);

let menu = document.querySelector('#menu-btn');
let useBtn = document.querySelector('#user-btn');

menu.addEventListener('click', function () {
    let nev = document.querySelector(
        ".navbar");
    nev.classList.toggle('active');
});

useBtn.addEventListener('click', function () {
    let userBox = document.querySelector(".user-box");
    userBox.classList.toggle('active');
});
/*------------home page slider------------------*/

"use strict"
const leftArrow = document.querySelector('.left-arrow .bxs-left-arrow'),
 rightArrow = document.querySelector('.right-arrow .bxs-right-arrow'),
    slider = document.querySelector('.slider');

console.log(slider);

// scroll to right ??this one

function scrollRight() {
    if (slider.scrollWidth - slider.clientWidth === (slider.scrollLeft).toFixed()) {
        slider.scrollTo({
            left: 0,
            behavior: "smooth"
        });
    } else {
        slider.scrollBy({
            left: window.innerWidth,
            behavior: 'smooth'
        })
    }
}

// scroll to left
function scrollLeft() {
    slider.scrollBy({
        left: -window.innerWidth,
        behavior: 'smooth'
    })
}

let timerId = setInterval(scrollRight,7000);

/*-------------reset timer to scrol right-------------- */
function resetTimer(){
    clearInterval(timerId);
    timerId = setInterval(scrollRight,7000);
}
/*---------------scroll event---------------- */
slider.addEventListener('click',function(ev){
    if(ev.target === leftArrow){
        scrollLeft();
        resetTimer();
    }
})

slider.addEventListener('click',function(ev){
    if(ev.target === rightArrow){
        scrollRight();
        resetTimer();
    }
})



/*--------------testimonial slider------------- */
let slides = document.querySelectorAll('.testimonial-item');
let index =0;
function nextSlider(){
    slider[index].classList.remove('active');
    index = (index+1) % slider.length;
    slider[index].classList.add('active');
}
function preSlider(){
    slider[index].classList.remove('active');
    index = (index-1+slider.length) % slider.length;
    slider[index].classList.add('active');
}