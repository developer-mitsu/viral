import "./hum.js";
import "./contact";
import "../curriculum/download.php";
import "../scss/curricurum.scss";
import "../scss/PHP.scss";

let tab1 = document.getElementsByClassName('curri-tab-select-front')[0]
let tab2 = document.getElementsByClassName('curri-tab-select-mu')[0]
let box1 = document.getElementsByClassName('curri-tab-front')[0]
let box2 = document.getElementsByClassName('curri-tab-mu')[0]


tab2.addEventListener('click', function () {
    if (box1.classList.contains('show') === true) {
        box2.classList.add('show')
        box1.classList.remove('show')
    }
})

tab1.addEventListener('click', function () {
    if (box2.classList.contains('show') === true) {
        box1.classList.add('show')
        box2.classList.remove('show')
    }
})
