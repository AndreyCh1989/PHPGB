<h2>Заказы</h2><hr>

<? foreach ($orders as $item): ?>
    <?php $item['orderUrl'] = "/order/show/?id={$item['id']}" ?>
    <div class='item-container' data-id="<?= $item['id']?>">
        <a href="<?=$item['orderUrl']?>">
            <h2>Заказ номер <?=$item['id']?></h2>
        </a>
        <p>Имя:<?=$item['name']?></p>
        <p>Электронная почта:<?=$item['email']?></p>
        <p>Стоимость заказа:<?=$item['total']?></p>
        Статус заказа:
        <select class="status" disabled data-value="<?=$item['status']?>">
            <option value="0">Оформлен</option>
            <option value="1">Отправлен</option>
            <option value="2">Отменен</option>
        </select><br>
        <?php if ($is_admin): ?>
            <button data-id="<?= $item['id']?>" class="cancel">Отменить</button>
            <button data-id="<?= $item['id']?>" class="ship">Отправить</button>
        <?php endif; ?>
    </div>
<? endforeach; ?>

<style>
 select.status {
    border: none;
    color: black;
    -webkit-appearance: none;
    -moz-appearance: none;
    text-indent: 1px;
    text-overflow: '';
 }
</style>

<script>
    let selects = document.querySelectorAll('select.status');
    selects.forEach(e => {
        let value = e.dataset.value;
        e.querySelector(`option[value="${value}"]`).defaultSelected = true;
    })

    document.addEventListener('click', (event) => {
        let element = event.target;
        if (element.tagName === 'BUTTON') {
            if (element.className === 'cancel') {
                endpoint = '/api/cancelorder/';
            }
            else if (element.className === 'ship') {
                endpoint = '/api/shiporder/';
            }

            let id = element.dataset.id;
            (async () => {
                const response = await fetch(endpoint, {
                    method: 'UPDATE',
                    headers: new Headers({
                        'Content-Type': 'application/json'
                    }),
                    body: JSON.stringify({
                        id: id
                    }),
                });
                const answer = await response.json();
                document.querySelector(`.item-container[data-id="${id}"]`).querySelector("select.status").value = answer.status;
            })();
        }
    })
</script>
