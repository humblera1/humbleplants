let menu = document.querySelector(".menu");
let firstList = document.querySelector(".first-list");
let body = document.body;

let catalog = document.querySelector('.catalog');
let articles = document.querySelector('.articles');


menu.addEventListener('click', show);

let classList = firstList.classList;

let flag = true;
function show(){
    if (flag){
        flag = false;
        classList.add('show'); 
        classList.remove('fade');
    }else{
       flag = true;
       classList.add('fade');
       classList.remove('show'); 
    }
}

