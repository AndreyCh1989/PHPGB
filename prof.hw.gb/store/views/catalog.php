<h1>Catalog</h1>
<div class="container">
    <?php foreach ($catalog as $product): ?>
        <?php $product['cardUrl'] = "?c=product&a=card&id={$product['id']}" ?>
        <a class="card" style="width: 18rem;" href="<?=$product['cardUrl']?>">
            <div class="card-body">
                <?php
                    $path = PICS_DIR . $product['image'];
                ?>
                <img class="img" src="<?=$path?>" data-id="<?=$product['id']?>" width="100" height="100"/>
                <div><?=$product['name']?></div>
                <div><?=$product['price']?></div>
                <div><?=$product['description']?></div>
            </div>
        </a>
    <?php endforeach;?>
</div>
<div class='button-row'>
    <?php
        $nextPage = $page + 1;
        $url = "?c=product&a=catalog&page={$nextPage}"
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
