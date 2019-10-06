<h2>Заказ номер <?=$order->getId()?></h2><hr>
<p>Имя:<?=$order->name?></p>
<p>Электронная почта:<?=$order->email?></p>
<p>Стоимость заказа:<?=$order->total?></p>
<h2>Позиции</h2><hr>
<? foreach ($items as $item): ?>
    <div class='item-container'>
        <h2><?=$item['name']?></h2>
        <p>Описание:<?=$item['description']?></p>
        <p>Цена:<?=$item['price']?></p>
    </div>
<? endforeach; ?>
