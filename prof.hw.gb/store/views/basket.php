<h2>Корзина</h2><hr>
<? foreach ($products as $item): ?>
    <div class='item-container' data-id="<?= $item['id_basket']?>">
        <h2><?=$item['name']?></h2>
        <p>Описание:<?=$item['description']?></p>
        <p>Цена:<?=$item['price']?></p>

        <button data-id="<?= $item['id_basket']?>" class="delete">Удалить</button>
    </div>
<? endforeach; ?>


<script>

    document.addEventListener('click', (event) => {
        let element = event.target;
        if (element.className === 'delete' && element.tagName === 'BUTTON') {
            let id = element.dataset.id;
            (async () => {
                const response = await fetch('/api/deletebasket/', {
                    method: 'DELETE',
                    headers: new Headers({
                        'Content-Type': 'application/json'
                    }),
                    body: JSON.stringify({
                        id: id
                    }),
                });
                const answer = await response.json();
                document.getElementById('count').innerText = answer.count;
                document.querySelector(`.item-container[data-id="${id}"]`).style.display = 'none';
            })();
        }
    })

</script>
