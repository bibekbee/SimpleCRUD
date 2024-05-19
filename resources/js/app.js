import './bootstrap';

class cards {
    constructor(arr){
        this.arr = arr;
    }

    displayCard(){
        const img_onroll = document.querySelector('#img_onroll');

        for(let i in this.arr){
            const div = document.createElement('div');
            div.classList.add('w-52','h-52','bg-gray-200','rounded-lg','flex','justify-center','items-center');
            div.innerHTML = `<div class=" my-auto">
                            <h1 class="line-height-2 font-bold text-xl">Hello</h1>
                            <p>${this.arr[i]}</p>
                            </div>`;
            img_onroll.appendChild(div);
        }
    }
}

let cardsOne = new cards(['World', 'Planet', 'Earth', 'Rock']);
window.onload = cardsOne.displayCard();

