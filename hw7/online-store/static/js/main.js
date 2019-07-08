function showProduct(obj) {
    document.querySelector('.modal-img').src = `static/img/catalog/${obj.dataset.img}`;
    document.querySelector('.modal-title').textContent = obj.dataset.name;
    document.querySelector('.modal-price').textContent = `Price ${obj.dataset.price}$`;
}

document.addEventListener('click', event => {
    if (event.target.className === 'img') {
        showProduct(event.target);
    }
});


function submitform(frmId)
{
  myFrm = document.getElementById(frmId);
  myFrm.submit();
}
