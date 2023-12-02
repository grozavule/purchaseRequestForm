import './bootstrap';

const MAX_FILE_UPLOAD_SIZE = 1048576; //(1 MB)

let itemCurrentIndex = 0;

//elements
const btnAdddItem = document.querySelector('#btn-add-item');
const btnSendRequest = document.querySelector('#btn-send-request');
const orderItemsList = document.querySelector('#item-list');
const itemContainer = document.querySelector('.item');
const orderTotal = document.querySelector('#order-total');
const poForm = document.querySelector('#po-request');
const fileUpload = document.querySelector('#pdf-file');
let itemUnitPrices = document.querySelectorAll('.unit-price');
let itemQuantities = document.querySelectorAll('.quantity');
let itemCount = document.querySelector('#item-count');

//functions
const displayAlert = message => {
    let alertContainer = document.createElement('div');
    alertContainer.classList.add('alert', 'alert-danger');
    alertContainer.textContent = message;
    poForm.prepend(alertContainer);
    window.scrollTo(0,0);
}
const sanitizeFloat = number => {
    let float = parseFloat(number.replaceAll(/[^0-9\.]/g, ''));
    return !isNaN(float) ? float : 0;
}

const updateOrderTotal = e => {
    let total = 0;
    for(let i = 0; i < itemUnitPrices.length; i++){
        let itemUnitPrice = sanitizeFloat(itemUnitPrices[i].value);
        let itemQuantity = sanitizeFloat(itemQuantities[i].value);
        total += (itemUnitPrice * itemQuantity);
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
    itemClone.setAttribute('id', `item${++itemCurrentIndex}`);
    itemClone.querySelectorAll('input, textarea').forEach(input => {
        input.value = '';
        input.setAttribute('name', input.name.replaceAll(/[0-9]/g, itemCurrentIndex));
    });
    orderItemsList.appendChild(itemClone);
    refreshEventListeners();

    itemCount.value = itemCurrentIndex + 1;
}

const verifyFileUploadSize = () => {
    return fileUpload.files.length <= 0 ||
        (fileUpload.files &&
            fileUpload.files.length > 0 &&
            fileUpload.files[0].size <= MAX_FILE_UPLOAD_SIZE);
}

const submitRequestForm = e => {
    e.preventDefault();
    if(verifyFileUploadSize()){
        poForm.submit();
    } else {
        displayAlert(`The file upload exceeds the ${MAX_FILE_UPLOAD_SIZE / 1024 / 1024}MB maximum allowed file size`);
    }
}

//event handlers
btnAdddItem.addEventListener('click', addItem);

btnSendRequest.addEventListener('click', submitRequestForm);

refreshEventListeners();
