<h1>Catalog</h1>
<div class="container">
    <?php foreach ($catalog as $product): ?>
        <?php $product['cardUrl'] = "?c=product&a=card&id={$product['id']}" ?>
        <div class="card" style="width: 18rem;" onClick="window.location = '<?=$product['cardUrl']?>'">
            <div class="card-body">
                <?php
                    $path = PICS_DIR . $product['image'];
                    $image = fopen($path, 'rb');
                    $Data = fread($image, filesize($path));
                    fclose($image);
                ?>
                <img class="img" src="data:image/jpeg;base64,<?=base64_encode($Data)?>" data-id="<?=$product['id']?>" width="100" height="100" data-toggle="modal" data-target="#exampleModal"/>
                <div><?=$product['name']?></div>
                <div><?=$product['price']?></div>
                <div><?=$product['description']?></div>
            </div>
        </div>
    <?php endforeach;?>
</div>
<div class='button-row'>
    <?php
        $nextPage = $page + 1;
        $url = "?c=product&a=catalog&page={$nextPage}"
    ?>
    <input type="button" value="Еще" onClick="window.location = '<?=$url?>'" />
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
