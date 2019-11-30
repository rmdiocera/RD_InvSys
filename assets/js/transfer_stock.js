var add_btn = document.getElementById('add_product_row');
var items = document.getElementById('product_row_header');

add_btn.addEventListener('click', addItem);

function addItem(e) {
    e.preventDefault();

    var itemElement = document.getElementById('product_row');
    var send_btn = document.getElementById('send_products');
    var elemClone = itemElement.cloneNode(true);
    elemClone.addEventListener('click', deleteItem);

    var cloneText = elemClone.querySelector('input');
    var test = elemClone.getElementsByTagName('td')[3];
    cloneText.value = '';
    
    items.insertBefore(elemClone, send_btn);

    // var btnGroup = document.createElement('div');
    // btnGroup.className = "float-right";
    // elemClone.appendChild(btnGroup);

    var del = document.createElement('button');
    del.className = 'btn btn-danger btn-sm delete';
    del.style.marginLeft = '30px';
    del.appendChild(document.createTextNode('Remove'));

    test.append(del);
}

function deleteItem(e) {
    if (e.target.classList.contains('delete')) {
        var deletedItem = e.target.parentElement.parentElement;
        items.removeChild(deletedItem);
    }
}