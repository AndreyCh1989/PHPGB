<nav>
    <a href="/"> Главная </a>
    <a href="/basket/"> Корзина <span id="count"><?=$count?></span></a>
    <?php if ($auth): ?>
        <a href="/order/"> Заказы </a>
    <?php endif; ?>
</nav>

<style>
    nav a {
        margin: 0 10px 0 10px;
    }
</style>
