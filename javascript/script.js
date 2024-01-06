var menu = document.getElementById('drop-icon')
let navbar = document.querySelector('.navbar');
let loadMoreFood = document.querySelector('.food .load-more .btn');
const nextItem = document.querySelector('.menu .load-more .next-btn');
const prevItem = document.querySelector('.menu .load-more .previous-btn')

let desertStart = 3;
let mainStart = 3;
let drinkStart = 3;
let desert = [...document.querySelectorAll('.menu-item.desert')];
let main = [...document.querySelectorAll('.menu-item.main')];
let drink = [...document.querySelectorAll('.menu-item.drink')];

menu.addEventListener('click', () => {
    menu.classList.toggle('open');
    navbar.classList.toggle('active');

    if (menu.classList.contains('open')) {
        menu.setAttribute('name', 'close');
    } else {
        menu.setAttribute('name', 'options-outline');
    }
});

var swiper = new Swiper(".home-slider", {
    centeredSlides: true,
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
    loop: true,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

nextItem?.addEventListener('click', () => {
    for(var i = 0; i < desertStart; i++) {
        if(i in desert) {
            desert[i].style.display = "none";
        } else {
            break;
        }
    }
    for(var i = 0; i < mainStart; i++) {
        if(i in main) {
            main[i].style.display = "none";
        } else {
            break;
        }
    }
    for(var i = 0; i < drinkStart; i++) {
        if(i in drink) {
            drink[i].style.display = "none";
        } else {
            break;
        }
    }

    for(var i = desertStart; i < desertStart+3; i++) {
        if(i in desert) {
            desert[i].style.display = "flex";
        } else {
            break;
        }
    }
    for(var i = mainStart; i < mainStart+3; i++) {
        if(i in main) {
            main[i].style.display = "flex";
        } else {
            break;
        }
    }
    for(var i = drinkStart; i < drinkStart+3; i++) {
        if(i in drink) {
            drink[i].style.display = "flex";
        } else {
            break;
        }
    }

    desertStart+=3;
    mainStart+=3;
    drinkStart+=3;
    prevItem.style.display = "flex";
    if(desertStart >= desert.length && mainStart >= main.length && drinkStart >= drink.length) {
        nextItem.style.display = "none";
    }
});

prevItem?.addEventListener('click', () => {
    for(var i = desertStart - 6; i < desertStart - 3; i++) {
        if(i in desert) {
            desert[i].style.display = "flex";
        } else {
            break;
        }
    }
    for(var i = mainStart - 6; i < mainStart - 3; i++) {
        if(i in main) {
            main[i].style.display = "flex";
        } else {
            break;
        }
    }
    for(var i = drinkStart - 6; i < drinkStart - 3; i++) {
        if(i in drink) {
            drink[i].style.display = "flex";
        } else {
            break;
        }
    }

    for(var i = desertStart - 3; i < desertStart; i++) {
        if(i in desert) {
            desert[i].style.display = "none";
        } else {
            break;
        }
    }
    for(var i = mainStart - 3; i < mainStart; i++) {
        if(i in main) {
            main[i].style.display = "none";
        } else {
            break;
        }
    }
    for(var i = drinkStart - 3; i < drinkStart; i++) {
        if(i in drink) {
            drink[i].style.display = "none";
        } else {
            break;
        }
    }

    desertStart-=3;
    mainStart-=3;
    drinkStart-=3;
    nextItem.style.display = "flex";
    if(desertStart <= 3 && mainStart <= 3 && drinkStart <= 3) {
        prevItem.style.display = "none";
    }
});

function reviewSlider() {
    var prevButton = document.getElementById("prev");
    var nextButton = document.getElementById("next");
    var reviewList = document.querySelector(".review-list");
    var reviewItem = document.querySelectorAll(".review-item");
    var currentItem = 0;

    nextButton?.addEventListener("click", () => {
        if (currentItem < reviewItem.length - 1) {
            currentItem++;
            updateSlider();
        } else if (currentItem == reviewItem.length - 1) {
            currentItem = 0;
            updateSlider();
        }
    });

    prevButton?.addEventListener("click", () => {
        if (currentItem > 0) {
            currentItem--;
            updateSlider();
        } else if (currentItem == 0) {
            currentItem = reviewItem.length - 1;
            updateSlider();
        }
    });

    function updateSlider() {
        var checkpx = reviewItem[currentItem].offsetWidth;
        var translateX = -currentItem * checkpx;
        reviewList.style.transform = `translateX(${translateX + "px"})`;
    }
}
reviewSlider();