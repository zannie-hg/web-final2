const allFilterItems = document.querySelectorAll('.menu-container .item');
const allFilterQuestions = document.querySelectorAll('tbody .question');
const allFilterOrders = document.querySelectorAll('tbody .order');
const allFilterBtns = document.querySelectorAll('.filter-btn');
const clearFilterBtn = document.querySelector('.clear-filter');
const nextItem = document.querySelector('.menu-container .next-previous .next');
const prevItem = document.querySelector('.menu-container .next-previous .previous');

const newItemImage = document.getElementById("newItemImage");
const imageSelect = document.getElementById("imageSelect");

let itemStart = 6;
var uploadImage = "";

function showFilteredContent(btn) {
    allFilterItems.forEach((item) => {
        if (item.classList.contains(btn.id)) {
            item.style.display = "grid";
        } else {
            item.style.display = "none";
        }
    });
    allFilterQuestions.forEach((question) => {
        if (question.classList.contains(btn.id)) {
            question.style.display = "";
        } else {
            question.style.display = "none";
        }
    });
    allFilterOrders.forEach((order) => {
        if(order.classList.contains(btn.id)) {
            order.style.display = "";
        } else {
            order.style.display = "none";
        }
    });
    if (nextItem !== null && prevItem !== null) {
        nextItem.style.display = "none";
        prevItem.style.display = "none";
    }
}

allFilterBtns?.forEach((btn) => {
    btn.addEventListener('click', () => {
        showFilteredContent(btn);
    });
});

clearFilterBtn?.addEventListener('click', () => {
    let item = [...document.querySelectorAll('.menu-container .item')];
    let question = [...document.querySelectorAll('tbody .question')];
    let order = [...document.querySelectorAll('tbody .order')];
    for (var i = 0; i < 6; i++) {
        if(i in allFilterItems) {
            item[i].style.display = "grid";
        }
    }
    for (var i = 6; i < item.length; i++) {
        if(i in allFilterItems) {
            item[i].style.display = "none";
        }
    }
    for (var i = 0; i < 12; i++) {
        if(i in question) {
            question[i].style.display = "";
        }
        if(i in order) {
            order[i].style.display = "";
        }
    }
    for (var i=12;i<item.length;i++) {
        if(i in question) {
            question[i].style.display = "none";
        }
        if(i in order) {
            order[i].style.display = "none";
        }
    }
    if (nextItem !== null) {
        nextItem.style.display = "grid";
    }
});

nextItem?.addEventListener('click', () => {
    let item = [...document.querySelectorAll('.menu-container .item')];
    for (var i = 0; i < itemStart; i++) {
        if (i in allFilterItems) {
            item[i].style.display = "none";
        } else {
            break;
        }
    }
    for (var i = itemStart; i < itemStart + 6; i++) {
        if (i in allFilterItems) {
            item[i].style.display = "grid";
        } else {
            break;
        }
    }
    itemStart += 6;
    prevItem.style.display = "grid";
    if (itemStart >= item.length) {
        nextItem.style.display = "none";
    }
});

prevItem?.addEventListener('click', () => {
    let item = [...document.querySelectorAll('.menu-container .item')];
    for (var i = itemStart - 12; i < itemStart - 6; i++) {
        if (i in allFilterItems) {
            item[i].style.display = "grid";
        } else {
            break;
        }
    }
    for (var i = itemStart - 6; i < itemStart; i++) {
        if (i in allFilterItems) {
            item[i].style.display = "none";
        } else {
            break;
        }
    }
    itemStart -= 6;
    nextItem.style.display = "grid";
    if (itemStart <= 6) {
        prevItem.style.display = "none";
    }
});

if (imageSelect !== null) {
    imageSelect.onchange = function () {
        const reader = new FileReader();
        reader.addEventListener("load", () => {
            uploadImage = reader.result;
            newItemImage.src = uploadImage;
        });
        reader.readAsDataURL(this.files[0]);
    }
}