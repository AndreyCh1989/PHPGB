<h2>Корзина</h2><hr>

<form class="submit" action="/order/add/" method="post">
    <?php if ($auth): ?>
        Имя <input type="text" name="name" placeholder="Имя" required="required" pattern="[A-Za-z0-9]{1,40}"><br>
        Электронная почта <input type="text" name="email" placeholder="Email" required="required" pattern="[A-Za-z0-9]{1,20}@[A-Za-z0-9]{1,20}.[A-Za-z0-9]{1,20}"><br>
    <?php else:?>
        Для оформления заказа необходимо авторизироваться.<br>
    <?php endif; ?>

    <b>Стоимость заказа: <span class='total'><?= $total ? $total : 0 ?></span> руб.</b><br>
    <?php
        $disabled = '';
        if (!$auth || count($products) == 0) {
            $disabled = 'disabled';
        }
    ?>
    <input class="submit-offer" type="submit" name="submit" <?= $disabled ?> value="Оформить заказ">
</form>

<? foreach ($products as $item): ?>
    <div class='item-container' data-id="<?= $item['id_basket']?>">
        <h2><?=$item['name']?></h2>
        <p>Описание:<?=$item['description']?></p>
        <p>Цена:<?=$item['price']?></p>

        <button data-id="<?= $item['id_basket']?>" class="delete">Удалить</button>
    </div>
<? endforeach; ?>

<style>
    form.submit {
        margin-top: 20px;
    }
</style>

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
                document.querySelector('.total').textContent = answer.total ? answer.total : 0;
                if (answer.total <= 0) {
                    document.querySelector('.submit-offer').disabled = true;
                }
            })();
        }
    })
</script>
