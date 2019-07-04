function showProduct(product) {
    document.querySelector('.modal-img').src = `static/img/catalog/${product.image}`;
    document.querySelector('.modal-title').textContent = product.name;
    document.querySelector('.modal-price').textContent = `Price ${product.price}$`;
}

document.addEventListener('click', event => {
    if (event.target.className === 'img') {
        fetch(`./sql_operations/getProductInfo.php?id=${+event.target.dataset.id}`, {
          method: 'GET'
        })
        .then(
            async (response) => {
                const reader = response.body.getReader();
                const decoder = new TextDecoder("utf-8");
                let string = "";
                while(true) {
                    let data = await reader.read();
                    if(data.done) break;
                    string += decoder.decode(data.value);
                }
                showProduct(JSON.parse(string)[0]);
            })
        .catch(error => console.error('Error:', error));
    }
});
