<h1>Catalog</h1>
<div class="container">
    <?php foreach ($catalog as $product): ?>
        <?php $product['cardUrl'] = "/product/card/?id={$product['id']}" ?>
        <div class="card" style="width: 18rem;">
            <a class="card-body" href="<?=$product['cardUrl']?>">
                <?php
                    $path = PICS_DIR . $product['image'];
                ?>
                <img class="img" src="<?=$path?>" data-id="<?=$product['id']?>" width="100" height="100"/>
                <div><?=$product['name']?></div>
                <div><?=$product['price']?></div>
                <div><?=$product['description']?></div>
            </a>
            <button class="buy" data-id="<?=$product['id']?>">Купить</button>
        </div>
    <?php endforeach;?>
</div>
<div class='button-row'>
    <?php
        $nextPage = $page + 1;
        $url = "/product/catalog/?page={$nextPage}"
    ?>
    <a class="button" value="Еще" href="window.location = '<?=$url?>'" />
</div>

<style>
.container {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
}
.card {
    width: 140px !important;
}
.button-row {
    width: 100%;
    display: flex;
    justify-content: center;
}
</style>

<script>

document.addEventListener('click', (event) => {
    let element = event.target;
    if (element.className === 'buy' && element.tagName === 'BUTTON') {
        let id = element.dataset.id;
        (async () => {
            const response = await fetch('/api/addbasket/', {
                method: 'POST',
                headers: new Headers({
                    'Content-Type': 'application/json'
                }),
                body: JSON.stringify({
                    id: id
                }),
            });
            const answer = await response.json();
            document.getElementById('count').innerText = answer.count;

        })();
    }
})
</script>
