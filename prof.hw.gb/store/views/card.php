<?
/**
 * @var app\models\Product $product
 */
?>

<h1><?=$product->name?></h1>
<?php
    $path = PICS_DIR . $product->image;
?>
<img class="img" src="<?=$path?>" width="300" height="300"/>
<p><?=$product->description?></p>
<p><?=$product->price?></p>
