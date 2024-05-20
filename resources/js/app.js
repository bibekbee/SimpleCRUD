import './bootstrap';

class card {
    constructor(arr){
        this.arr = arr;
    }

    displayCard(ElementName, classList, textLight=false){
        const img_onroll = document.querySelector(ElementName);
        let textcolor = textLight ? 'text-white' : 'text-black'; 
        for(let i in this.arr){
            const div = document.createElement('div');
            div.classList.add(...classList);
            div.innerHTML = `<div class=" my-auto ${textcolor} ">
                            <h1 class="line-height-2 font-bold text-xl">Hello</h1>
                            <p>${this.arr[i]}</p>
                            </div>`;
            img_onroll.appendChild(div);
        }
    }
}

let cardOne = new card(['World', 'Planet', 'Earth', 'Rock']);
let cardTwo = new card(['Javascript', 'HTML', 'PHP', 'CSS']);
window.onload = cardOne.displayCard('#img_onroll', ['w-52','h-52','bg-gray-200','rounded-lg','flex','justify-center','items-center']);
window.onload = cardTwo.displayCard('.fourdiv', ['w-52','h-52','bg-yellow-400','flex','justify-center','items-center']);



