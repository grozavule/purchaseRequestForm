import './bootstrap';

let itemsCounter = 1;

//elements
const btnAdddItem = document.querySelector('#btn-add-item');
const btnSendRequest = document.querySelector('#btn-send-request');
const orderItemsList = document.querySelector('#item-list');
const itemContainer = document.querySelector('.item');
const orderTotal = document.querySelector('#order-total');
let itemUnitPrices = document.querySelectorAll('.unit-price');
let itemQuantities = document.querySelectorAll('.quantity');

//functions
const sanitizeFloat = number => {
    console.log("number", number);
    let float = parseFloat(number.replaceAll(/[^0-9\.]/g, ''));
    console.log("float", float);
    return !isNaN(float) ? float : 0;
}

const updateOrderTotal = e => {
    let total = 0;
    for(let i = 0; i < itemUnitPrices.length; i++){
        let itemUnitPrice = sanitizeFloat(itemUnitPrices[i].value);
        let itemQuantity = sanitizeFloat(itemQuantities[i].value);
        total += (itemUnitPrice * itemQuantity);
        console.log("updateOrderTotal", itemUnitPrice, itemQuantity, total);
    }
    let dollarAmt = total.toLocaleString('en-US', {
        style: 'currency',
        currency: 'USD'
    });
    orderTotal.textContent = dollarAmt;
}

const refreshEventListeners = () => {
    itemUnitPrices = document.querySelectorAll('.unit-price');
    itemQuantities = document.querySelectorAll('.quantity');

    itemQuantities.forEach(item => {
        item.addEventListener('change', updateOrderTotal);
    });
    itemUnitPrices.forEach(item => {
        item.addEventListener('change', updateOrderTotal);
    });
}

const addItem = e => {
    e.preventDefault();
    let itemClone = itemContainer.cloneNode(true);
    itemClone.querySelectorAll('input, textarea').forEach(input => input.value = '');
    itemClone.setAttribute('id', `item${++itemsCounter}`);
    orderItemsList.appendChild(itemClone);
    refreshEventListeners();
}

//event handlers
btnAdddItem.addEventListener('click', addItem);

refreshEventListeners();


